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
                'famille_nom' => 'required|max:255|unique:familles,famille_nom',
                'groupe' => 'required|exists:groupes,id'
            ]);
            Famille::create([
                'famille_nom' => $request->input('famille_nom'),
                'groupe_id' => $request->input('groupe'),
            ]);
            return redirect(route('familles'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
    public function edit(Famille $famille)
    {
        $groupes = Groupe::get();
        return view('operateur.familles.edit', compact('famille', 'groupes'));
    }
    public function update(Request $request, Famille $famille)
    {
        try {
            $request->validate([
                'famille_nom' => 'max:255',
                'groupe' => 'required|exists:groupes,id'
            ]);

            $famille->update([
                'famille_nom' => $request->input('famille_nom'),
                'groupe_id' => $request->input('groupe'),
            ]);

            return redirect()->route('familles');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function destroy(Famille $famille) {
        $famille->delete();
        return redirect()->route('familles');
    }
}
