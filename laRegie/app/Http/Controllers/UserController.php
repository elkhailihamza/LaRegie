<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        return view('admin.index', compact('users'));
    }
    public function edit(User $user)
    {
        $metiers = Metier::get();
        $profiles = Profile::get();
        return view('admin.edit', compact('user', 'metiers', 'profiles'));
    }
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'nom' => 'string|max:255',
                'prenom' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users,email,' . $user->id,
                "profile" => "exists:profiles,id",
                'metier' => 'exists:metiers,id',
            ]);

            $user->update([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'email' => $request->input('email'),
                'profile_id' => $request->input('profile'),
                'metier_id' => $request->input('metier'),
            ]);

            return redirect()->route('users.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User deleted successfully.');
    }
}
