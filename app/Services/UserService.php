<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function registerUser($data)
    {
        $data = array_merge($data, ['password' => bcrypt($data['password'])]);
        return $this->userRepository->register($data);
    }

    public function logoutUser()
    {
        return Auth::logout();
    }
    
}