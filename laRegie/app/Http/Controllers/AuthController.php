<?php

namespace App\Http\Controllers;

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
                "mot_de_pass" => "required",
            ]);
            $credentials = $request->only('email', 'mot_de_pass');

            if (!Auth::attempt($credentials)) {
                return redirect()->back()->withInput()->withErrors(["credentials" => "Wrong credentials!"]);
            }

            return redirect()->intended("user.dashboard")->withSuccess("Successfully Logged in!");
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            "nom" => "required|max:126",
            "prenom" => "required|max:126",
            "email" => "required|email",
            "mot_de_pass" => "required|confirmed|min:8",
        ]);

        User::create([
            "nom" => $request->input("nom"),
            "prenom" => $request->input("prenom"),
            "email" => $request->input("email"),
            "mot_de_pass" => Hash::make($request->input("mot_de_pass")),
        ]);

        return redirect()->route('user.dashboard')->withSuccess('Successfully created account!');
    }
    public function loginPage()
    {
        return view("auth.login");
    }
    public function registerPage()
    {
        return view("register");
    }
}
