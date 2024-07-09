<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use App\Models\Groupe;
use App\Models\Segment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::count();
        $familles = Famille::count();
        $segments = Segment::count();
        $articles = Article::count();
        return view('index', compact('groupes', 'familles', 'segments', 'articles'));
    }
    public function profile()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);

            $request->validate([
                'nom' => 'string|max:255',
                'prenom' => 'string|max:255',
            ]);


            $user->update([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
            ]);

            return redirect()->route('profile');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
}
