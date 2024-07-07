<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\isEmpty;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('articles', compact('articles'));
    }
    public function view(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article', compact('article'));
    }
    public function create()
    {
        $segments = Segment::get();
        return view('operateur.articles.create', compact('segments'));
    }
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'article_nom' => 'required|max:255|unique:articles,article_nom',
                'description' => 'required|string',
                'segment' => 'required',
            ]);
            $segment = Famille::findOrFail($request->input('segment'));

            Article::create([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
                'segment_id' => $segment->id,
            ]);
            return redirect()->route('articles');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
    public function edit(Article $article)
    {
        $segments = Segment::get();
        $selectedArticle = Article::findOrFail($article->id);
        return view('operateur.articles.edit', compact('selectedArticle', 'segments'));
    }
    public function update(Request $request, Article $article)
    {
        try {
            $request->validate([
                'article_nom' => 'required|max:255',
                'description' => 'required|string',
                'segment' => 'required',
            ]);

            $segment = Famille::findOrFail($request->input('segment'));
            $article->update([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
                'segment' => $segment->id,
            ]);
            return redirect()->route('articles');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!isset($query)) {
            $articles = Article::paginate(6);
        } else {
            $articles = Article::where('article_nom', 'like', '%' . $query . '%')
                ->paginate(6);
        }
        $count = count($articles);
        return response()->json([
            'view' => view('components.search', compact('articles'))->render(),
            'count' => $count,
        ], 201);
    }
}
