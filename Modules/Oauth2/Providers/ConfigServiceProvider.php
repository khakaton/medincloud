<?php


namespace Modules\Oauth2\Providers;


use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Oauth2\Resolvers\SocialUserResolver;
use Modules\Oauth2\Services\Repositories\OauthProviderClient\EloquentOauthProviderClientRepository;
use Modules\Oauth2\Services\Repositories\OauthProviderClient\OauthProviderClientRepositoryInterface;
use Modules\Oauth2\Services\Repositories\SocialAccount\EloquentSocialAccountRepository;
use Modules\Oauth2\Services\Repositories\SocialAccount\SocialAccountRepositoryInterface;
use Modules\Oauth2\Services\Repositories\User\EloquentUserRepository;
use Modules\Oauth2\Services\Repositories\User\UserRepositoryInterface;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Связать абстракции с классами
     */
    protected function registerBindings()
    {
        $this->app->bind(SocialUserResolverInterface::class, SocialUserResolver::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(OauthProviderClientRepositoryInterface::class, EloquentOauthProviderClientRepository::class);
        $this->app->bind(SocialAccountRepositoryInterface::class, EloquentSocialAccountRepository::class);
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->mergeConfig(require $path, $config));
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }
            if (! Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }
        return $array;
    }
}
