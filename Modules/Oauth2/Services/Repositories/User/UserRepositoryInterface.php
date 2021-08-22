<?php


namespace Modules\Oauth2\Services\Repositories\User;


interface UserRepositoryInterface
{
    public function findByEmail(string $email);

    public function createFromArray(array $data);
}
