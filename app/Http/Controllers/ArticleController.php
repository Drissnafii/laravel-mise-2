<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

use function Pest\Laravel\artisan;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();
        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'Article Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Article $article)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $all = $request->all();
        $article->update($all);
        return redirect()->route('articles.index')->with('success', 'Article updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted');
    }
}
