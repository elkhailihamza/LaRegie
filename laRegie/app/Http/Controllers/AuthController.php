<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                "email" => "required|email",
                "password" => "required",
            ]);
            $credentials = $request->only('email', 'password');

            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                $request->session()->regenerate();
                return redirect()->route('index');
            }

            return redirect()->back()->withInput()->withErrors(["credentials" => "Wrong credentials!"]);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
   
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function loginPage()
    {
        return view("auth.login");
    }
}
