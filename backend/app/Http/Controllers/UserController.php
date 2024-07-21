<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    /**
     * [Description for __construct]
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * [Description for index]
     *
     * @return JsonResponse
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
                'data'       => $user,
                'message'    => 'Get users not found'
            ]);
        }
    }
}
