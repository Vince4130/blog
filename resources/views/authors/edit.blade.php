@extends('layouts.app')

@section('title', 'Update the Author')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Update the Author</h1>
            <form action="{{ route('authors.update', $author) }}" id="myForm" name="myForm" class="myForm" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname :</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $author->lastname }}">
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname :</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $author->firstname }}">
                </div>

                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname :</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $author->nickname ?? 'N/A' }}">
                </div>

                <div class="mb-3">
                    <label for="birth" class="form-label">Birthdate :</label>
                    <input type="date" class="form-control" name="birth" id="birth" value="{{ $author->birth }}">
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail adress :</label>
                    <input class="form-control" type="text" name="mail" id="mail" value="{{ $author->mail ?? 'N/A'}}">
                </div>

                <div class="mb-3 container__link">
                    <button type="submit" class="btn btn-dark"><i class="fa-solid fa-database p-2"></i>Save</button>
                    <button type="reset" class="btn btn-dark"><i class="fa-solid fa-rotate p-2"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection