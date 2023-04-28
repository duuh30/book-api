<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class RegisterController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UserRegisterRequest $request
     * @return mixed
     */
    public function register(UserRegisterRequest $request) :UserResource
    {
        return new UserResource($this->userService->store($request->all()));
    }
}
