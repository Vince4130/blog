<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Http\Requests\StoreArticleRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Collection;

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
        $articlesAuthors = DB::table('articles')
            ->select('articles.id', 'title', 'content', 'authors.lastname', 'authors.firstname', 'articles.author_id')
            ->leftJoin('authors', 'authors.id', '=', 'articles.author_id')->paginate(5);

        return view('articles.index', ['articlesAuthors' => $articlesAuthors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Author $author)
    {
        $author = Author::find($author->id);
       
        return view('articles.create', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();

        $article->title     = $request->input('title');
        $article->content   = $request->input('content');
        $article->author_id = $request->input('author_id');

        try {

            if ($article->save()) {
                $author = $this->getAuthor($article);
                session()->flash('success', "Your article has been successfully recorded");
                return redirect(route('authors.show', $author));
            }
        } catch (\exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, your article hasn't been recorded");
        }

        return redirect(route('articles.create'));

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
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->title   = $request->input('title');
        $article->content = $request->input('content');

        $author = $this->getAuthor($article);

        try {
            if ($article->save()) {
                session()->flash('success', "Your article has been successfully updated");
            }
        } catch (Exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, your article hasn't been updated");
        }

        return redirect(route('authors.show', $author));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $author = $this->getAuthor($article);

        try {

            if ($article->delete()) {
                session()->flash('success', 'Your article has been successfully deleted');
            }
        } catch (Exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, your article hasn't been deleted");
        }
        
        return redirect(route('authors.show', $author));
       
    }

    
    /**
     * getAuthor
     *
     * @param  mixed $article
     * @return Author
     */
    public function getAuthor(Article $article) : Author
    {
        $author = Author::find($article->author_id);

        return $author;
    }
}
