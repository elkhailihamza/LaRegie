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
                'groupe_nom' => 'required|max:255',
                'metier' => 'required|exists:metiers,id'
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
    public function edit(Groupe $groupe)
    {
        $metiers = Metier::get();
        return view('operateur.groupes.edit', compact('groupe', 'metiers'));
    }
    public function update(Request $request, Groupe $groupe)
    {
        try {
            $request->validate([
                'groupe_nom' => 'max:255',
                'metier' => 'required|exists:metiers,id',
            ]);

            $groupe->update([
                'groupe_nom' => $request->input('groupe_nom'),
                'metier_id' => $request->input('metier'),
            ]);

            return redirect()->route('groupes');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function destroy(Groupe $groupe) {
        $groupe->delete();
        return redirect()->route('groupes');
    }
}
