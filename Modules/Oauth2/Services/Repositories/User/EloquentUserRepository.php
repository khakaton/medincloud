<?php


namespace Modules\Oauth2\Services\Repositories\User;


use App\User;

class EloquentUserRepository implements UserRepositoryInterface
{

    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createFromArray(array $data)
    {
        return User::create($data);
    }
}
