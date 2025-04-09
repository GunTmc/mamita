<?php

namespace App\Services\Auth;

use App\Repositories\Users\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function login($data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            request()->session()->regenerate();
            return Auth::user();
        }
        return null;
    }


    public function logout()
    {
        Auth::logout();
    }
}
