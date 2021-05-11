<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Account\Contracts\UserAuthenticator;
use App\Services\Account\Contracts\UserRegister;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
{
    public function login(LoginRequest $request, UserAuthenticator $authenticator): JsonResponse
    {
        $token = $authenticator->login($request->validated());

        return response()->json([
            "token" => $token,
        ], Response::HTTP_OK);
    }

    public function register(RegisterRequest $request, UserRegister $register): JsonResponse
    {
        $register->register($request->validated());

        return response()->json([
            "message" => __("auth.success"),
        ], Response::HTTP_OK);
    }

    public function logout(Request $request, UserAuthenticator $authenticator): JsonResponse
    {
        $authenticator->logout($request->user());

        return response()->json([
            "message" => __("auth.logout_success"),
        ], Response::HTTP_OK);
    }
}

