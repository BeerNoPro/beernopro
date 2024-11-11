<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    protected $userService;

    /**
     * [Description for __construct]
     *
     * @param \App\Services\UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * [Description for index]
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        try {
            $user = $this->userService->getAllUser();

            return response()->json([
                'status'     => 200,
                'data'       => $user,
                'message'    => 'Get users success'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json([
                'status'     => 404,
                'message'    => 'Get users not found'
            ]);
        }
    }
}
