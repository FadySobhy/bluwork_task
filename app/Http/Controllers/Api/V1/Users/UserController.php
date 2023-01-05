<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Actions\Contracts\Users\DeleteUser;
use App\Actions\Contracts\Users\GetPaginatedUsers;
use App\Actions\Contracts\Users\UpdateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param GetPaginatedUsers $getPaginatedUsers
     * @return ResourceCollection
     */
    public function index(GetPaginatedUsers $getPaginatedUsers): ResourceCollection
    {
        return UserResource::collection($getPaginatedUsers->handle());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param UpdateUser $updateUser
     * @param User $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, UpdateUser $updateUser, User $user): JsonResponse
    {
        $updateUser->handle($user, $request->validated());

        return $this->successResponse(['message' => 'The user has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteUser $deleteUser
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(DeleteUser $deleteUser, User $user): JsonResponse
    {
        $deleteUser->handle($user);

        return $this->successResponse(['message' => 'The user has been deleted successfully']);
    }
}
