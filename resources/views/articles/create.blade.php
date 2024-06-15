@extends('layouts.app')

@section('title', 'Add an Author')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Create Your Article</h4>
            <form action="{{ route('articles.store') }}" id="myForm" name="myForm" class="myForm" method="POST">
                @csrf
                <input type="hidden" name="author_id" id="author_id" value="<?= $author->id ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content :</label>
                    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                </div>

                <div class="mb-3 add__submit">
                    <button type="submit" class="btn btn-dark"><i class="fa-solid fa-database p-2"></i>Save</button>
                    <button type="reset" class="btn btn-dark"><i class="fa-solid fa-rotate p-2"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection