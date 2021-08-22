<?php


namespace Modules\Oauth2\Resolvers;


use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Modules\Oauth2\Entities\OauthProviderClient;
use Modules\Oauth2\Services\SocialAccountsService;

class SocialUserResolver implements SocialUserResolverInterface
{
    /**
     * @var SocialAccountsService
     */
    private $socialAccountsService;

    /**
     * SocialUserResolver constructor.
     * @param SocialAccountsService $socialAccountsService
     */
    public function __construct(SocialAccountsService $socialAccountsService)
    {
        $this->socialAccountsService = $socialAccountsService;
    }

    /**
     * @param string $provider
     * @param string $accessToken
     * @return Authenticatable|null
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        $providerUser = null;

        $providerClient = OauthProviderClient::find($provider);

        if (! $providerClient) {
            throw new \Exception("Provider client not found.", 404);
        }

        $this->socialAccountsService->setClientConfig($providerClient);

        try {
            $providerUser = Socialite::driver($providerClient->provider->name)->userFromToken($accessToken);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }

        if ($providerUser) {
            return $this->socialAccountsService->findOrCreateUser($providerClient->provider, $providerClient, $providerUser);
        }

        return null;
    }
}
