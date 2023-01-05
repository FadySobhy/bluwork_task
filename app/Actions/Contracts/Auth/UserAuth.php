<?php

namespace App\Actions\Contracts\Auth;

use App\Models\User;

interface UserAuth
{
    /**
     * @param User $user
     * @return array
     */
    public function handle(User $user): array;
}
