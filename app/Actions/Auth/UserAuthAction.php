<?php

namespace App\Actions\Auth;

use App\Actions\Contracts\Auth\UserAuth;
use App\Models\User;

class UserAuthAction implements UserAuth
{

    /**
     * @param User $user
     * @return array
     */
    public function handle(User $user): array
    {
        return ['token' => $user->createToken('authToken')->plainTextToken];
    }
}
