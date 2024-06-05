<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FamilleController extends Controller
{
    public function index()
    {
        $familles = Famille::paginate(4);
        return view('familles', compact('familles'));
    }
    public function create()
    {
        $groupes = Groupe::select('id', 'groupe_nom')->get();
        return view('operateur.familles.create', compact('groupes'));
    }
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'famille_nom' => 'required|max:255|unique:groupes,groupe_nom',
                'groupe' => 'required|numeric|in:1,2,3'
            ]);
            Famille::create([
                'famille_nom' => $request->input('famille_nom'),
                'group_id' => $request->input('groupe'),
            ]);
            return redirect(route('familles'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
}
