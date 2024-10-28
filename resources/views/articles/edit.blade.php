@extends('layouts.app')

@section('title', 'Update your Article')

@section('content')

<div class="container">
    @include('flash-message')
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Update your Article</h1>
            <form action="{{ route('articles.update', $article) }}" id="myForm" name="myForm" class="myForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content :</label>
                    <textarea class="form-control " id="content" name="content" rows="5">{{ $article->content }}</textarea>
                </div>

                <div class="mb-3 container__link">
                    <button type="submit" class="btn btn-dark"><i class="fa-solid fa-database p-2"></i>Save</button>
                    <button type="reset" class="btn btn-dark"><i class="fa-solid fa-rotate p-2"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-3 container__link">
        <a class="btn btn-dark" data-bs-toggle="tooltip" data-bs-title="Previous" href="{{ url()->previous() }}"><i class="fa-solid fa-backward-step"></i></a>
    </div>
</div>
@endsection