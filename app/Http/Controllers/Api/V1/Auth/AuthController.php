<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Contracts\Auth\UserAuth;
use App\Actions\Contracts\Users\FindUserByUserName;
use App\Actions\Contracts\Users\StoreUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param FindUserByUserName $findUserByUserName
     * @param UserAuth $userAuth
     * @return JsonResponse
     */
    public function login(
        LoginRequest $request,
        FindUserByUserName $findUserByUserName,
        UserAuth $userAuth
    ): JsonResponse
    {
        $data = $request->validated();
        $user = $findUserByUserName->handle($data['user_name']);

        if (!Hash::check($data['password'], $user->getAuthPassword())) {
            return $this->errorResponse('Unauthorised');
        }

        return $this->successResponse($userAuth->handle($user));
    }

    /**
     * @param RegisterRequest $request
     * @param StoreUser $storeUser
     * @param UserAuth $userAuth
     * @return JsonResponse
     */
    public function register(
        RegisterRequest $request,
        StoreUser $storeUser,
        UserAuth $userAuth
    ): JsonResponse
    {
        $data = $request->validated();

        $user = $storeUser->handle($data);
        return $this->successResponse($userAuth->handle($user));
    }
}
