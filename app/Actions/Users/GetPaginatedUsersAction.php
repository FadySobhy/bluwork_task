<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Actions\Contracts\Users\GetPaginatedUsers;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetPaginatedUsersAction implements GetPaginatedUsers
{
    /**
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator
    {
        return User::query()->paginate();
    }
}
