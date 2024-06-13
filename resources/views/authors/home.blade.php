@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h1>Blog NFA042</h1>
            <div class="mb-3">
                <a class="btn btn-dark" href="{{ route('authors.index') }}"><i class="fa-solid fa-user-group fa-lg p-2"></i>Authors List</a>
                <a class="btn btn-dark" href="{{ route('authors.create') }}"><i class="fa-solid fa-user-plus fa-lg p-2"></i>Add an Author</a>
            </div>
        </div>
    </div>
</div>
@endsection