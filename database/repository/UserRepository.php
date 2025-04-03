<?php

use app\Models\User;

class UserRepository
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

    public function getUsers($filter = [])
    {
        return User::where($filter)->get();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function getUserByLogin($login)
    {
        return User::where('login', $login)->first();
    }
}
