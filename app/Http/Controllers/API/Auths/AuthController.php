<?php

namespace App\Http\Controllers\API\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auths\AuthRequest;
use App\Services\Auth\ApiAuthService;

class AuthController extends Controller
{
    public function __construct(private ApiAuthService $authService) {}

    public function auth(AuthRequest $request)
    {
        $data = $request->validated();
        $user = $this->authService->login($data);

        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successfully',
                'data' => [
                    'token' => $user->tokenApi,
                    'user' => [
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'wife' => $user->wife,
                        'husband' => $user->husband
                    ]
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Login failed',
                'data' => [
                    'message' => 'Invalid email or password'
                ]
            ])->setStatusCode(400);
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout successfully',
            'data' => null
        ]);
    }
}
