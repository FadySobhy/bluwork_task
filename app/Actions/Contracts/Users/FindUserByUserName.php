<?php

namespace App\Actions\Contracts\Users;

use App\Models\User;

interface FindUserByUserName
{
    /**
     * @param string $userName
     * @return User
     */
    public function handle(string $userName): User;
}
