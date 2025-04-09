<?php

namespace App\Services\Users;

use App\Models\User;
use App\Repositories\Users\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function __construct(private UserRepository $userRepository) {}


    public function getUser($data): User
    {
        return $this->userRepository->getUserById($data['id']);
    }

    public function updateUser($data)
    {
        $user = $this->userRepository->getUserById($data['id']);
        $image = isset($data['image']) ?  Storage::put('users', $data['image']) : $user->image;

        $requestUpdate = [
            'name' => $data['name'] ?? $user->name,
            'email' => $data['email'] ?? $user->email,
            'phone' => $data['phone'] ?? $user->phone,
            'healthcare_name' => $data['nameHealthCare'] ?? $user->healthcare_name,
            'healthcare_address' => $data['addressHealthCare'] ?? $user->healthcare_address,
            'username' => $data['username'] ?? $user->username,
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
            'rule' => $data['rule'] ?? $user->rule,
            'verified_at' => is_null($user->verified) && isset($data['verified']) ? Carbon::now() : $user->verified,
            'x' => isset($data['x']) ? $data['x'] : $user->x,
            'facebook' => isset($data['facebook']) ? $data['facebook'] : $user->facebook,
            'instagram' => isset($data['instagram']) ? $data['instagram'] : $user->instagram,
            'image' => $image
        ];

        $this->userRepository->updateUserById($requestUpdate, $user->id);
    }

    public function deleteUser($data)
    {
        $this->userRepository->deleteUserById($data['id']);
    }

    public function dataUsers($data)
    {
        return $this->userRepository->getAllUserAdmins($data);
    }
}
