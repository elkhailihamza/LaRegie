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
    public function register(Request $request)
    {
        try {
            $request->validate([
                "nom" => "required|max:126",
                "prenom" => "required|max:126",
                "email" => "required|unique:users,email|email",
                "password" => "required|confirmed|min:8",
                "profile" => "required|exists:profiles,id",
                "metier" => "required|exists:metiers,id",
            ]);

            User::create([
                "nom" => $request->input("nom"),
                "prenom" => $request->input("prenom"),
                "email" => $request->input("email"),
                "password" => Hash::make($request->input("password")),
                'profile_id' => $request->input("profile"),
                'metier_id' => $request->input("metier"),
            ]);

            return redirect()->route('admin.index')->withSuccess('Successfully created account!');
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
    public function registerPage()
    {
        $metiers = Metier::get();
        $profiles = Profile::get();
        return view("admin.register", compact('metiers', 'profiles'));
    }
}
