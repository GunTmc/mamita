<?php

namespace App\Services\Auth;

use App\Repositories\Users\UserRepository;
use Illuminate\Support\Facades\Hash;

class ApiAuthService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function login($data)
    {
        $user = $this->userRepository->getUserByEmail($data['email']);
        if ($user && Hash::check($data['password'], $user->password)) {
            $user->tokenApi = $user->createToken($user->email)->plainTextToken;
            return $user;
        }

        return null;
    }

    public function logout()
    {
        request()->user()->tokens()->delete();
    }
}
