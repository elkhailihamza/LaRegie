<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function ArticlePage()
    {
        $articles = Article::paginate(4);
        return view('Articles', compact('articles'));
    }
    public function ArticleCreationPage()
    {
        $familles = Famille::select('id', 'famille_nom')->get();
        return view('articlesCreation', compact('familles'));
    }
    public function create(Request $request)
    {
        try {
            $request->validate([
                'Article_nom' => 'required|max:255|unique:groupes,groupe_nom',
                'groupe' => 'required|numeric|in:1,2,3'
            ]);
            Article::create([
                'Article_nom' => $request->input('Article_nom'),
                'group_id' => $request->input('groupe'),
            ]);
            return redirect(route('Articles'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
}
