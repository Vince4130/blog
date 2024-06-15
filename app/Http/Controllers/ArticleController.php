<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function home()
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articlesAuthors = db::table('articles')
            ->select('articles.id', 'title', 'content', 'authors.lastname', 'authors.firstname')
            ->join('authors', 'authors.id', '=', 'articles.author_id')->get();

        return view('articles.index', ['articlesAuthors' => $articlesAuthors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $author_id)
    {
        $author = Author::find($author_id);
       
        return view('articles.create', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->title     = $request->input('title');
        $article->content   = $request->input('content');
        $article->author_id = $request->input('author_id');
        
        $article->save();

        return redirect(route('articles.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
