@extends('layouts.app')

@section('title', 'Author')

@section('content')

    <div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Author Details</h4>
            <table id="author__table" class="table table-striped authortable">
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
                            <a class="navbar-brand" href="{{ route('authors.edit', $author) }}">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>
                        </td>
                        <td>
                            <a class="navbar-brand" href="mailto:{{ isset($author->mail) ? $author->mail : ''}}">
                                <i class="fa-solid fa-envelope fa-lg"></i>
                            </a>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 list__submit">
        <a class="btn btn-dark" href="{{ route('articles.create', ['author' => $author]) }}"><i class="fa-solid fa-folder-plus fa-lg p-2"></i>Add an article</a>
        <a class="btn btn-dark" href="{{ route('authors.index') }}"><i class="fa-solid fa-rotate-left white p-2"></i>Back</a>
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
                        <div class="accordion-body">
                            <div class="content">
                                <strong>Content : </strong> 
                                {!! nl2br(e($article->content)) !!}
                            </div>
                            <div class="author">
                                <strong>Author : </strong> 
                                {{ $author->firstname.' '.$author->lastname }}
                            </div>
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

