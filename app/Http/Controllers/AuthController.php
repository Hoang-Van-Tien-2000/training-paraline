<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $request->flash();
        $user = $this->userRepository->register($request->all());
        auth()->login($user);
        return redirect()->to('/admin');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $request->flash();
        $params = $request->all();
        $data = [
            'email' => $params['email'],
            'password' => $params['password']
        ];

        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect('/admin');
        }

        return redirect()->back()->with('error', config('messages.login_failed'));
    }

    public function logout()
    {
        $this->userRepository->logout();
        return redirect()->route('admin.login');
    }
}
