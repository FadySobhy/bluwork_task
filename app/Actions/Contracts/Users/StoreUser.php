<?php

namespace App\Actions\Contracts\Users;

use App\Models\User;

interface StoreUser
{
    /**
     * @param array $data
     * @return User
     */
    public function handle(array $data): User;
}
