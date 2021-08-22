<?php


namespace Modules\Oauth2\Services\Repositories\OauthProviderClient;


use Modules\Oauth2\Entities\OauthProviderClient;

class EloquentOauthProviderClientRepository implements OauthProviderClientRepositoryInterface
{
    /**
     * @param array $ids
     * @return mixed
     */
    public function getByIds(array $ids)
    {
        return OauthProviderClient::whereIn('id', $ids)->get();
    }
}
