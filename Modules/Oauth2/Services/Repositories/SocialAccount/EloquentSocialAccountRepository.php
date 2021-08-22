<?php


namespace Modules\Oauth2\Services\Repositories\SocialAccount;


use Modules\Oauth2\Entities\OauthProvider;
use Modules\Oauth2\Entities\SocialAccount;

class EloquentSocialAccountRepository implements SocialAccountRepositoryInterface
{
    /**
     * @param OauthProvider $provider
     * @param $id
     * @return mixed
     */
    public function findUserBySocialId(OauthProvider $provider, $id)
    {
        return SocialAccount::where('provider_id', $provider->id)
            ->where('oauth_uid', $id)
            ->first();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createFromArray(array $data)
    {
        return SocialAccount::create($data);
    }
}
