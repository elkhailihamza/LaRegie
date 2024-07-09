<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SegmentController extends Controller
{
    public function index()
    {
        $segments = Segment::paginate(6);
        return view('segments', compact('segments'));
    }
    public function create()
    {
        $familles = Famille::select('id', 'famille_nom')->get();
        return view('operateur.segments.create', compact('familles'));
    }
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|max:255|unique:segments,libelle',
                'famille' => 'required|exists:familles,id'
            ]);
            Segment::create([
                'libelle' => $request->input('libelle'),
                'famille_id' => $request->input('famille'),
            ]);
            return redirect(route('segments'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
    public function edit(Segment $segment)
    {
        $familles = Famille::get();
        return view('operateur.segments.edit', compact('segment', 'familles'));
    }
    public function update(Request $request, Segment $segment)
    {
        try {
            $request->validate([
                'libelle' => 'max:255',
                'famille' => 'required|exists:familles,id'
            ]);

            $segment->update([
                'libelle' => $request->input('libelle'),
                'famille_id' => $request->input('famille'),
            ]);

            return redirect()->route('segments');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function destroy(Segment $segment) {
        $segment->delete();
        return redirect()->route('segments');
    }
}
