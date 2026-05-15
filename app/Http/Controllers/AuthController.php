<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        if (session()->has('user')) return redirect()->route('home');
        return view('login');
    }

    public function login(Request $request)
    {
        $valid_user = "admin";
        $valid_pass = "123";

        if ($request->username == $valid_user && $request->password == $valid_pass) 
        {
            // Set session Laravel 
            session(['user' => $request->username]);
            return redirect()->route('home');
        }

        //jika gagal, kembali ke login dengan pesan error
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('home');
    }
}
