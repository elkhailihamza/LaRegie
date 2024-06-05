<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(4);
        return view('articles', compact('articles'));
    }
    public function create()
    {
        $familles = Famille::get();
        return view('operateur.articles.create', compact('familles'));
    }
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'article_nom' => 'required|max:255|unique:groupes,groupe_nom',
                'famille' => 'required|numeric'
            ]);
            Article::create([
                'Article_nom' => $request->input('article_nom'),
                'famille_id' => $request->input('famille'),
            ]);
            return redirect()->route('articles.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
}
