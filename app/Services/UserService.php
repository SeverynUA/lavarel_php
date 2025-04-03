<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function addUser($data)
    {
        return User::create($data);
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function getUsers($filters = [])
    {
        return User::where($filters)->get();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function getUserByLogin($login)
    {
        return User::where('email', $login)->first();
    }
}