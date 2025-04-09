<?php

namespace App\Services\Register;

use App\Repositories\Users\UserRepository;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function register($data)
    {
        return $this->userRepository->createUser([
            'name' => $data['name'] ?? null,
            'email' => $data['email'],
            'username' => $data['username'] ?? null,
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'] ?? null,
            'healthcare_name' => $data['healthcareName'] ?? null,
            'healthcare_address' => $data['healthcareAddress'] ?? null,
            'husband' => $data['husband'] ?? null,
            'wife' => $data['wife'] ?? null,
            'rule' => $data['rule'],
        ]);
    }
}
