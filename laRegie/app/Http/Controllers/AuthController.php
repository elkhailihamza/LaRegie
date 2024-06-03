<?php

namespace App\Http\Controllers;

use App\Models\Metier;
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

            return redirect()->intended("home")->withSuccess("Successfully Logged in!");
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
                "mot_de_pass" => "required|confirmed|min:8",
                "metier" => "required|in:1,2,3",
            ]);

            User::create([
                "nom" => $request->input("nom"),
                "prenom" => $request->input("prenom"),
                "email" => $request->input("email"),
                "mot_de_pass" => Hash::make($request->input("mot_de_pass")),
                'metier_id' => $request->input("metier"),
                'profile_id' => 1,
            ]);

            return redirect()->route('users')->withSuccess('Successfully created account!');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function loginPage()
    {
        return view("auth.login");
    }
    public function registerPage()
    {
        $metiers = Metier::get();
        return view("admin.register", compact('metiers'));
    }
}
