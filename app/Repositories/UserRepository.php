<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository 
{
    public function model()
    {
        return User::class;
    }

    public function register($data)
    {
        $data = array_merge($data, ['password' => bcrypt($data['password'])]);
        return User::create($data);
    }

    public function logout()
    {
        return Auth::logout();
    }
}    