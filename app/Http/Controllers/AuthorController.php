<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $authors = Author::paginate(10);
        
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
                session()->flash('success', "Your have been successfully recorded");
                return redirect(route('authors.index'));
            }

        } catch (\exception $e) {
            Log::error($e->getmessage());
            session()->flash('error', "Something wen't wrong, your haven't been recorded");
        }

        return redirect(route('authors.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        // $author = Author::find($id);
        
        return view('authors.show', compact('author'));
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

        $author->save();

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect(route('authors.index'));
    }
}
