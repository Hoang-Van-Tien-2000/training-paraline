<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class AuthController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function register()
    {
        return view('auth.register');
    } 
    
    public function postRegister(RegisterRequest $request)
    {
        $user = $this->userService->registerUser($request->all());  
        auth()->login($user);
        return redirect()->to('/admin');
    } 
    
    public function login()
    {
        return view('auth.login');
    }   
    public function postLogin(LoginRequest $request)
    {
        $params = $request->all();
        $data = [
            'email' => $params['email'],
            'password' => $params['password']
        ];
        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect('/admin');
        }
        return redirect()->back()->with('msg','(*)  Email or password is incorrect');
    }
    public function logout()
    {
        $this->userService->logoutUser();
        return redirect()->route('admin.login');
    } 
}