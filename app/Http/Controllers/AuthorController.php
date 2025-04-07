<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Article;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Exceptions;


class AuthorController extends Controller
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
        $authors = Author::orderBy('lastname')->paginate(10);
        
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = new Author();

        $author->lastname  = $request->input('lastname');
        $author->firstname = $request->input('firstname');
        $author->nickname  = $request->input('nickname');
        $author->mail      = $request->input('mail');
        $author->birth     = $request->input('birth');
        
        try {

            if($author->save()) {
                session()->flash('success', "You have been successfully recorded");
                return redirect(route('authors.index'));
            }

        } catch (\exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, you haven't been recorded");
        }

        return redirect(route('authors.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $articlesAuthor = DB::table('articles')
            ->select('articles.id','title', 'content', 'articles.author_id')
            ->join('authors', 'authors.id', '=', 'articles.author_id')
            ->where('authors.id', $author->id)
            ->paginate(4);     

        return view('authors.show', ['author' => $author, 'articlesAuthor' => $articlesAuthor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $author->lastname  = $request->input('lastname');
        $author->firstname = $request->input('firstname');
        $author->nickname  = $request->input('nickname');
        $author->birth     = $request->input('birth');
        $author->mail      = $request->input('mail');

        $articlesAuthor = $this->getArticles($author->id);

        try {
            if ($author->save()) {
                session()->flash('success', 'Your profile has been successfully updated');
            }
        } catch (Exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, your profile hasn't been updated");
        }
        

        return redirect(route('authors.show', $author));
        // return view('authors.show', ['author' => $author, 'articlesAuthor' => $articlesAuthor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect(route('authors.index'));
    }


    public function getArticles($author)
    {
        $articles = DB::table('articles')
                        ->select('*')
                        ->where('author_id', $author)
                        ->paginate(4);

        return $articles;
    }
}
