<?php

namespace App\Http\Controllers;

use App\Exports\ArticleExport;
use App\Models\Article;
use App\Models\Segment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

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
                'segment' => 'required|exists:segments,id',
            ]);

            Article::create([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
                'segment_id' => $request->input('segment'),
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
                'segment' => 'required|exists:segments,id',
            ]);

            $article->update([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
                'segment_id' => $request->input('segment'),
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
        $type = $request->input('type');
        switch ($type) {
            case 1:
                $articles = Article::join('segments', 'articles.segment_id', '=', 'segments.id')
                    ->join('familles', 'segments.famille_id', '=', 'familles.id')
                    ->join('groupes', 'familles.groupe_id', '=', 'groupes.id')
                    ->where('groupes.groupe_nom', 'like', '%' . $query . '%')
                    ->paginate(6);
                break;
            case 2:
                $articles = Article::join('segments', 'articles.segment_id', '=', 'segments.id')
                    ->join('familles', 'segments.famille_id', '=', 'familles.id')
                    ->where('familles.famille_nom', 'like', '%' . $query . '%')
                    ->paginate(6);
                break;
            case 3:
                $articles = Article::join('segments', 'articles.segment_id', '=', 'segments.id')
                    ->where('segments.libelle', 'like', '%' . $query . '%')
                    ->paginate(6);
                break;
            default:
                $articles = Article::where('article_nom', 'like', '%' . $query . '%')
                    ->paginate(6);
        }
        $count = count($articles);
        return response()->json([
            'view' => view('components.search', compact('articles'))->render(),
            'count' => $count,
        ], 201);
    }
    public function export()
    {
        return Excel::download(new ArticleExport, 'articles.xlsx');
    }

    public function ViewPDF(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $pdf = PDF::loadView('exports.articles_pdf', compact('article'))->setPaper('a4', 'portrait')->set_option('isRemoteEnabled', true);
        return $pdf->stream(ucfirst($article->article_nom) . '.pdf');
    }
}
