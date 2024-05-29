<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "mot_de_pass" => "required",
        ]);
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput()->withErrors("Wrong credentials!");
        }

        return redirect()->route("user.dashboard")->withSuccess("Successfully Logged in!");
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
