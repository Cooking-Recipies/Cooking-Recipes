<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Authentication\UserLoggerInterface;
use App\Services\Authentication\UserRegisterInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
{
    public function login(LoginRequest $request, UserLoggerInterface $service): JsonResponse
    {
        $token = $service->login($request->validated());

        return response()->json([
            "token" => $token,
        ], Response::HTTP_OK);
    }

    public function register(RegisterRequest $request, UserRegisterInterface $service): JsonResponse
    {
        $service->register($request->validated());

        return response()->json([
            "message" => __("auth.success"),
        ], Response::HTTP_OK);
    }

    public function logout(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        $user->tokens()->where("id", $user->currentAccessToken()->id)->delete();

        return response()->json([
            "message" => __("auth.logout_success"),
        ], Response::HTTP_OK);
    }
}

