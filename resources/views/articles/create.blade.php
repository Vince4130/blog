@extends('layouts.app')

@section('title', 'Add an Article')

@section('content')

<div class="container">
    @include('flash-message')
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Create Your Article</h1>
            <form action="{{ route('articles.store') }}" id="myForm" name="myForm" class="myForm" method="POST">
                @csrf
                <input type="hidden" name="author_id" id="author_id" value="<?= $author->id ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content :</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 container__link">
                    <button type="submit" class="btn btn-dark container__link--submit"><i class="fa-solid fa-database p-2"></i>Save</button>
                    <button type="reset" class="btn btn-dark container__link--submit"><i class="fa-solid fa-rotate p-2"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection