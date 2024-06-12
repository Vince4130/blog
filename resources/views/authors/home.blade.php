@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    <div class="main">
        Bienvenu sur le site
    </div>
    <div class="link">
        <p><button type="button" onclick=window.location.href="{{ route('authors.index') }}">Authors List</button></p>
    </div>
    <div class="link">
        <p><button type="button" onclick=window.location.href="{{ route('authors.create') }}">Add an Author</button></p>
    </div>
@endsection
