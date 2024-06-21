<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Famille;
use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('articles', compact('articles'));
    }
    public function view(Article $article) {
        $article = Article::findOrFail($article->id);
        return view('article', compact('article'));
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
                'article_nom' => 'required|max:255|unique:articles,Article_nom',
                'description' => 'required|string',
                'famille' => 'required',
            ]);
            $famille = Famille::findOrFail($request->input('famille'));
            DB::beginTransaction();
            $segment = Segment::create([
                'famille_id' => $famille->id,
            ]);
            Article::create([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
                'segment_id' => $segment->id,
            ]);
            DB::commit();
            return redirect()->route('articles');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    public function edit(Article $article)
    {
        $familles = Famille::get();
        $selectedArticle = Article::findOrFail($article->id);
        return view('operateur.articles.edit', compact('selectedArticle', 'familles'));
    }
    public function update(Request $request, Article $article)
    {
        try {
            $request->validate([
                'article_nom' => 'required|max:255',
                'description' => 'required|string',
                'famille' => 'required',
            ]);

            $famille = Famille::findOrFail($request->input('famille'));

            DB::beginTransaction();
            $article->segment->update([
                'famille_id' => $famille->id,
            ]);
            $article->update([
                'article_nom' => $request->input('article_nom'),
                'description' => $request->input('description'),
            ]);
            DB::commit();
            return redirect()->route('articles');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles');
    }
}
