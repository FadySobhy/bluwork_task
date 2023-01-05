<?php

namespace App\Actions\Users;

use App\Actions\Contracts\Users\UpdateUser;
use App\Models\User;

class UpdateUserAction implements UpdateUser
{

    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    public function handle(User $user, array $data): void
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);
    }
}
