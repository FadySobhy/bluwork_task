<?php

namespace App\Actions\Contracts\Users;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GetPaginatedUsers
{
    /**
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator;
}
