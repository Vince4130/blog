@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Blog NFA042</h1>
            <div class="mb-3 container__link">
                <a class="btn btn-dark container__link--width" href="{{ route('authors.index') }}"><i class="fa-solid fa-user-group fa-lg p-2"></i>Authors</a>
                <a class="btn btn-dark container__link--width" href="{{ route('articles.index') }}"><i class="fa-solid fa-newspaper fa-lg p-2"></i>Articles</a>
            </div>
        </div>
    </div>
</div>
@endsection