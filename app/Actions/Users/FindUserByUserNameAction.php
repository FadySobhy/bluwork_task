<?php

namespace App\Actions\Users;

use App\Actions\Contracts\Users\FindUserByUserName;
use App\Models\User;

class FindUserByUserNameAction implements FindUserByUserName
{
    /**
     * @param string $userName
     * @return User
     */
    public function handle(string $userName): User
    {
        return User::where('user_name', $userName)->first();
    }
}
