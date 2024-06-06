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
                'familles' => 'required|array',
                'familles.*' => 'required|numeric',
            ]);
            DB::beginTransaction();
            foreach ($request->input('familles') as $famille_id) {
                $segment = Segment::create([
                    'famille_id' => $famille_id,
                ]);
                Article::create([
                    'article_nom' => $request->input('article_nom'),
                    'description' => $request->input('description'),
                    'segment_id' => $segment->id,
                ]);
            }
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
    public function edit(Article $article)
    {
        $familles = Famille::get();
        return view('operateur.articles.edit', compact('article', 'familles'));
    }
    public function update(Request $request, Article $article)
    {
        try {
            $request->validate([
                'groupe_nom' => 'max:255',
                'metier' => 'numeric',
            ]);

            DB::beginTransaction();
            $article->segments()->delete();

            foreach ($request->input('familles') as $famille_id) {
                $segment = Segment::create([
                    'famille_id' => $famille_id,
                ]);

                $article->segments()->save($segment);
            }

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
