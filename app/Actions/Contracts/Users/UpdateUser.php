<?php

namespace App\Actions\Contracts\Users;

use App\Models\User;

interface UpdateUser
{
    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    public function handle(User $user, array $data): void;
}
