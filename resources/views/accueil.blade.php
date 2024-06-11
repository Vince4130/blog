@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
   <div class="main">
        Bienvenu sur le site
   </div>
   <div class="link">
        <p><a href="{{ route('authors.list') }}">Authors List</a></p>
   </div>
   <div class="link">
   <p><a href="{{ route('author.form') }}">Add an Author</a></p>
    </div>
@endsection