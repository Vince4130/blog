@extends('layouts.app')

@section('title', 'Author')

@section('content')

<div class="container">
    @include('flash-message')
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Author</h1>
            <table id="author__table" class="table table-striped author-table">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Nickname</th>
                        <th>Edit</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $author->lastname }}</td>
                        <td>{{ $author->firstname }}</td>
                        <td>{{ isset($author->nickname) ?  $author->nickname : 'N/A' }}</td>
                        <td>
                            <a class="navbar-brand" data-bs-toggle="tooltip" data-bs-title="Details/Update" href="{{ route('authors.edit', $author) }}">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>
                        </td>
                        <td>
                            @if($author->mail !== null)
                                <a class="navbar-brand" data-bs-toggle="tooltip" data-bs-title="Mail to" href="mailto:{{ isset($author->mail) ? $author->mail : ''}}">
                                    <i class="fa-solid fa-envelope fa-lg"></i>
                                </a>
                            @else 
                                <a href="#" class="navbar-brand" data-bs-toggle="tooltip" data-bs-title="Unknown email">
                                    <i class="fa-solid fa-envelope fa-lg"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 container__link">
        <a class="btn btn-dark container__link--width" href="{{ route('articles.create', ['author' => $author]) }}"><i class="fa-solid fa-folder-plus fa-lg p-2"></i>Add an article</a>
        <a class="btn btn-dark container__link--width" href="{{ route('authors.index') }}"><i class="fa-solid fa-rotate-left white fa-lg p-2"></i>Authors List</a>
    </div>
    <div class="card">
        <div class="card-body bg-light">
            <h4>Articles</h4>
            @if(count($articlesAuthor) > 0)
            
            @foreach($articlesAuthor as $article)
            <div class="accordion p-2" id="accordion{{ $article->id }}">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $article->id }}" aria-expanded="false" aria-controls="collapse{{ $article->id }}">
                            Title : {{ $article->title }} 
                        </button>
                    </h2>
                    <div id="collapse{{ $article->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion{{ $article->id }}">
                        <div class="accordion-body p-2">
                            <div class="article">
                                <strong>Content : </strong> 
                                {!! nl2br(e($article->content)) !!}
                            </div>
                            <div class=" article article--author">
                                <strong>Author : </strong> 
                                {{ $author->firstname.' '.$author->lastname }}
                            </div>
                            <div class="article article--update">
                                <strong>Edit/Del : </strong> 
                                <a class="navbar-brand" href="{{ route('articles.edit', $article->id) }}">
                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </a>
                                <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#delArticle{{ $article->id }}">
                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="delArticle{{ $article->id }}" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete the article "{{ $article->title }}" writen by {{ $author->firstname.' '.$author->lastname }} ?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-dark" href="{{ route('articles.destroy', $article->id) }}">Yes</a>
                            <a class="btn btn-dark" data-bs-dismiss="modal" aria-label="close">No</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                {{ $articlesAuthor->links() }}
            </div>
            @else
                <div class="mb-3">
                    <h4>No articles have been published by {{ $author->firstname.' '.$author->lastname }}</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

