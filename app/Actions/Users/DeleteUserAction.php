<?php

namespace App\Actions\Users;

use App\Actions\Contracts\Users\DeleteUser;
use App\Models\User;

class DeleteUserAction implements DeleteUser
{

    /**
     * @param User $user
     * @return void
     */
    public function handle(User $user): void
    {
        $user->delete();
    }
}
