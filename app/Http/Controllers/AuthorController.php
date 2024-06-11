<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

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
        $authors = Author::all();
        
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
    public function store(Request $request)
    {
        $author = new Author();

        $author->lastname  = $request->input('lastname');
        $author->firstname = $request->input('firstname');
        $author->birth     = $request->input('birth');

        $author->save();

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
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

        $author->save();

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Author $author)
    {
        $author->delete();

        return redirect(route('authors.index'));
    }
}
