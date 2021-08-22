<?php


namespace Modules\Oauth2\Services\Repositories\SocialAccount;


use Modules\Oauth2\Entities\OauthProvider;

interface SocialAccountRepositoryInterface
{
    public function findUserBySocialId(OauthProvider $provider, $id);

    public function createFromArray(array $data);
}
