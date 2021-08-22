<?php


namespace Modules\Oauth2\Http\Controllers;

use App\Http\Controllers\Auth\LoginController as AppLoginController;

use App\Services\Robots\RobotsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Modules\Oauth2\Entities\OauthLoginAction;
use Modules\Oauth2\Entities\OauthProvider;
use Modules\Oauth2\Entities\OauthProviderClient;
use Modules\Oauth2\Services\SocialAccountsService;
use SocialiteProviders\Manager\OAuth2\User as OauthUser;
use Illuminate\Support\Facades\Auth;


class LoginController extends AppLoginController
{
    /**
     * @var SocialAccountsService
     */
    protected $socialAccountsService;

    /**
     * LoginController constructor.
     * @param SocialAccountsService $socialAccountsService
     * @param RobotsService $robotsService
     */
    public function __construct(
        SocialAccountsService $socialAccountsService,
        RobotsService $robotsService
    ) {
        parent::__construct($robotsService);
        $this->socialAccountsService = $socialAccountsService;
        Auth::logout();
    }

    /**
     * Перенаправить запрос на провайдера
     * @param Request $request
     * @param $provider_client_id
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider(Request $request, $provider_client_id)
    {
        $mobileLogin = $request->has('mobile') && $request->get('mobile') == 1 ? 1 : 0;
        $providerClient = OauthProviderClient::find($provider_client_id);
        if (!$providerClient)
            return redirect()->back()->withErrors(['message' => 'Provider client not found.']);
        $this->socialAccountsService->setClientConfig($providerClient);
        session()->put('provider_client_id', $provider_client_id);
        session()->put('is_mobile_login', $mobileLogin);
        return Socialite::driver($providerClient->provider->name)->stateless()->redirect();
    }

    /**
     * Обработать обратный запрос провайдера на получение пользователя, зарегистрировать,
     * если не существует и залогинить его в системе
     * @param $provider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        $providerClient = OauthProviderClient::find(session()->get('provider_client_id'));
        $isMobile = session()->get('is_mobile_login');
        $this->socialAccountsService->setClientConfig($providerClient);
        $provider = OauthProvider::where('name', $provider)->first();
        if (!$provider)
            return redirect()->back()->withErrors(['message' => 'Provider not found.']);
        try {
            $socialiteUser = Socialite::driver($provider->name)->stateless()->user();
            $user = $this->socialAccountsService->findOrCreateUser($provider, $providerClient, $socialiteUser);
            if ($isMobile) {
                session()->forget('is_mobile_login');
                return $socialiteUser->accessTokenResponseBody;
            }
            if (!$user)
                return redirect()->back();

            $emailParts = explode('@', $user->email);
            $login = implode('_', $emailParts);

            setcookie("chat_login_username", $login, [
                'expires' => time() + 3600,
                'path' => '/',
                'domain' => 'regagro.net',
            ]);

            $providerClients = $this->socialAccountsService
                ->getRolesIdsByProviderClientId($socialiteUser, $providerClient->client_id);

            auth()->login($user, true);

            $this->doAfterLoginActions($providerClients, $socialiteUser, $user);

            // Auth in the chat

            if ($this->userHasChatAccess($socialiteUser)) {
                $this->authInTheChat($user, $login);
            }
        } catch (\Exception $e) {
            return redirect('/login');
        }
        return redirect($this->redirectTo);
    }

    /**
     * Выполнить действия после авторизации
     * @param $providerClients
     * @param $socialiteUser
     * @param $user
     */
    protected function doAfterLoginActions($providerClients, $socialiteUser, $user)
    {
        $actions = OauthLoginAction::whereIn('provider_client_id', $providerClients)->where([
            ['name', '!=', null],
            ['source', '!=', null],
            ['model_class', '!=', null],
            ['data', '!=', null],
            ['status', 1],
        ])->orderBy('priority')->get();
        if ($actions) {
            $prevActions = [];
            foreach ($actions as $action) {
                $model = '\\' . $action->model_class;
                $modelObj = $model;
                $data = [];
                $attachableData = [];
                $uniqueData = $action->unique_data ? array_keys($action->unique_data) : [];
                $attributes = $this->getModelFillableData($socialiteUser, $user, $action, $prevActions);
                foreach ($attributes as $attr => $val) {
                    $data[$attr] = $val;
                    if (in_array($attr, $uniqueData)) {
                        $attachableData[$attr] = $val;
                    }
                }
                $prevActions[$action->priority] = $modelObj::updateOrCreate($attachableData, $data);
            }
        }
    }

    /**
     * Сформировать данные для заполнения атрибутов модели
     * @param $source
     * @param $user
     * @param $action
     * @param $prevActions
     * @return array
     */
    protected function getModelFillableData($source, $user, $action, $prevActions)
    {
        $fillableData = [];
        foreach ($action->data as $key => $value) {
            $fillableData[$value] = $this->parseSource($key, $source, $user, $prevActions);
        }
        return $fillableData;
    }

    /**
     * Обработать данные источника данных
     * @param $key
     * @param $source
     * @param $user
     * @param $prevActions
     * @return array|mixed
     */
    protected function parseSource($key, $source, $user, $prevActions)
    {
        if ($source instanceof OauthUser) {
            $value = $source->getRaw();
        } else {
            $value = $source;
        }
        $value['current_user'] = $user->toArray();
        $value['prev_actions'] = $prevActions;
        $keyParts = explode('.', $key);
        foreach ($keyParts as $part) {
            if (is_object($part))
                $value = $value->$part ?? null;
            else
                $value = $value[$part] ?? null;
        }
        return $value;
    }

    /**
     * Авторизовать пользователя в чате
     * @param $user
     * @param $login
     */
    protected function authInTheChat($user, $login)
    {
        $res = $this->socialAccountsService->sendCurlToChatAuth($login);


        if (isset($res['error'])) {
            $res = $res['error'];
        } elseif (isset($res['success'])) {
            $res = $res['success'];
        } else {
            $res = 'Chat is not activated.';
        }

        setcookie("chat_login_response", $res, [
            'expires' => time() + 3600,
            'path' => '/',
            'domain' => 'regagro.net',
        ]);
    }

    /**
     * Проверить, подключен ли у пользователя чат
     * @param $user
     * @return bool
     */
    protected function userHasChatAccess($user)
    {
        $services = $user->getRaw()['oauth_roles'] ?? null;
        if ($services) {
            $services = collect($services);
            if ($services->where('oauth_client_id', 15)->first()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Записать в файл конфигурации сервиса настройки для провайдера
     * @param $client
     * @param string $file
     * @return false|int
     */
    public function writeProviderClientSettingsToConfig($client, string $file)
    {
        $tab = '    ';
        $fileContent = file($file, 2);
        foreach ($fileContent as $line => $content) {
            if (Str::contains($content, $client->provider->name)) {
                $settings = [
                    $tab . $tab ."'client_id' => '" . $client->client_id . "',",
                    $tab . $tab ."'client_secret' => '" . $client->client_secret . "',",
                    $tab . $tab ."'redirect' => '" . $client->provider->redirect_uri . "',",
                ];
                if ($client->host) $settings[] = $tab . $tab ."'host' => '" . $client->host . "',";
                for ($i = $line + 1, $s = 0; $s < count($settings); $i++, $s++) {
                    array_splice($fileContent, $i, 1, $settings[$s]);;
                }
                break;
            }
        }
        return file_put_contents($file, implode(PHP_EOL, $fileContent));
    }
}
