<?php

namespace App\Providers;

use App\Actions\Auth\UserAuthAction;
use App\Actions\Contracts\Auth\UserAuth;
use App\Actions\Contracts\Users\DeleteUser;
use App\Actions\Contracts\Users\FindUserByUserName;
use App\Actions\Contracts\Users\GetPaginatedUsers;
use App\Actions\Contracts\Users\StoreUser;
use App\Actions\Contracts\Users\UpdateUser;
use App\Actions\Users\DeleteUserAction;
use App\Actions\Users\FindUserByUserNameAction;
use App\Actions\Users\GetPaginatedUsersAction;
use App\Actions\Users\StoreUserAction;
use App\Actions\Users\UpdateUserAction;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //Auth
        $this->app->bind(UserAuth::class, UserAuthAction::class);

        //Users
        $this->app->bind(StoreUser::class, StoreUserAction::class);
        $this->app->bind(UpdateUser::class, UpdateUserAction::class);
        $this->app->bind(DeleteUser::class, DeleteUserAction::class);
        $this->app->bind(GetPaginatedUsers::class, GetPaginatedUsersAction::class);
        $this->app->bind(FindUserByUserName::class, FindUserByUserNameAction::class);
    }
}
