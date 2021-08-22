<?php


namespace Modules\Oauth2\Services\Repositories\OauthProviderClient;


interface OauthProviderClientRepositoryInterface
{
    public function getByIds(array $ids);
}
