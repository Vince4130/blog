@extends('layouts.app')


@section('title', 'Articles')

@section('content')
<div class="container">
    @include('flash-message')
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Articles</h1>
            @if(count($articlesAuthors) > 0)
            
            @foreach($articlesAuthors as $article)
            <div class="accordion p-2" id="accordion{{ $article->id }}">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $article->id }}" aria-expanded="false" aria-controls="collapse{{ $article->id }}">
                            Title : {{ $article->title }} 
                        </button>
                    </h2>
                    <div id="collapse{{ $article->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion{{ $article->id }}">
                        <div class="accordion-body">
                            <div class="article">
                                <strong>Content : </strong> 
                                {!! nl2br(e($article->content)) !!}
                            </div>
                            <div class="article article--author">
                                <strong>Author : </strong> 
                                {{ $article->firstname.' '.$article->lastname }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                {{ $articlesAuthors->links() }}
            </div>
            @else
                <div class="mb-3">
                    <h4>There are no articles saved</h4>
                </div>
            @endif
            <div class="mb-3 container__link">
                <a class="btn btn-dark container__link--width" href="{{ route('authors.index') }}"><i class="fa-solid fa-user-group fa-lg p-2"></i>Authors</a>
                <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-home fa-xl"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection