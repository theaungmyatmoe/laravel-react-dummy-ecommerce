<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function login()
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = \request()->only(['email', 'password']);

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect('/admin');
        }

        return redirect()->back()->with('error', 'Email or Password did not match');

    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
