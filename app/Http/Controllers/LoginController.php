<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $fields = $request->validated();

        if (Auth::attempt($fields)) {
            $request->session()->regenerate();
            return redirect()->intended('products');
        }

        return back()->withInput()
            ->withErrors([
                'email' => 'Incorrect email and/or password.'
            ]);
    }
}
