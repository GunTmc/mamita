<?php

namespace App\Repositories\Users;

use App\Models\User;

class UserRepository
{
    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function updateUserById($data, $id)
    {
        return User::where('id', $id)->update($data);
    }

    public function deleteUserById($id)
    {
        return User::where('id', $id)->delete();
    }

    public function getAllUserAdmins($params)
    {
        return User::where('rule', '!=', User::ROLE_SUPER_ADMIN)
            ->where('rule', '!=', User::ROLE_USER)
            ->when(isset($params['search']), function ($query) use ($params) {
                return $query->whereRaw('LOWER(users.email) like ?', ['%' . strtolower($params['search']) . '%']);
            });
    }
    public function getAllUserUsers($params)
    {
        return User::where('rule',  User::ROLE_USER)
            ->when(isset($params['search']), function ($query) use ($params) {
                return $query->whereRaw('LOWER(users.email) like ?', ['%' . strtolower($params['search']) . '%']);
            });
    }

    public function getUserById($id)
    {
        return User::where('id', $id)->first();
    }
}
