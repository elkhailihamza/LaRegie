<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::paginate(5);
        return view('groupes', compact('groupes'));
    }
    public function create()
    {
        $metiers = Metier::get();
        return view('operateur.groupes.create', compact('metiers'));
    }
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'groupe_nom' => 'required|max:255|unique:groupes,groupe_nom',
                'metier' => 'required|numeric|in:1,2,3'
            ]);
            Groupe::create([
                'groupe_nom' => $request->input('groupe_nom'),
                'metier_id' => $request->input('metier'),
            ]);
            return redirect(route('groupes'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
    public function edit(Groupe $groupe) {
        return view('');
    }
}
