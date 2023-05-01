<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\login;
use App\Http\Requests\Auth\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
    {
        return view('Auth.Registration');
    }

    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect()->route('auth.login');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $email)->first();
            if($user->role = 'admin')
            {
                return redirect()->route('create.company');
            }
        } else {
            return redirect()->back()->with('message', 'Something went to wrong ! please try again.');
        }
    }
}
