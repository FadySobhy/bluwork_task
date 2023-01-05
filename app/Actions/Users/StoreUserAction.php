<?php

namespace App\Actions\Users;

use App\Actions\Contracts\Users\StoreUser;
use App\Models\User;

class StoreUserAction implements StoreUser
{

    /**
     * @param array $data
     * @return User
     */
    public function handle(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
