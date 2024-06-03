<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GroupeController extends Controller
{
    public function groupePage()
    {
        $groupes = Groupe::paginate(4);
        return view('groupes')->with(['groupes' => $groupes]);
    }
    public function groupeCreationPage()
    {
        $metiers = Metier::get();
        return view('groupeCreation', compact('metiers'));
    }
    public function create(Request $request)
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
}
