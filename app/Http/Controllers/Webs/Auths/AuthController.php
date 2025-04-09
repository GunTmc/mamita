<?php

namespace App\Http\Controllers\Webs\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auths\AuthRequest;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function login()
    {
        return view('auth.login');
    }

    public function auth(AuthRequest $request)
    {
        $data = $request->validated();
        $user = $this->authService->login($data);
        if (!$user) {
            return redirect(route('auth.login'))->with('errorLogin', 'Email or password is incorrect');
        }

        return redirect()->intended(route('home'));
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect(route('auth.login'));
    }
}
