<?php

namespace App\Actions\Contracts\Users;

use App\Models\User;

interface DeleteUser
{
    /**
     * @param User $user
     * @return void
     */
    public function handle(User $user): void;
}
