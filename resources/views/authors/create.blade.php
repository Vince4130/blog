@extends('layouts.app')

@section('title', 'Add an Author')

@section('content')

<div class="container">
    @include('flash-message')
    <div class="card">
        <div class="card-body bg-light">
            <h1 class="container__title">Add an Author</h1>
            <form action="{{ route('authors.store') }}" id="myForm" name="myForm" class="myForm" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname :</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname :</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}">
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname :</label>
                    <input type="text" class="form-control" id="nickname" name="nickname">
                </div>

                <div class="mb-3">
                    <label for="birth" class="form-label">Birthdate :</label>
                    <input type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" id="birth" value="{{ old('birth') }}">
                    @error('birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail adress :</label>
                    <input class="form-control" type="text" name="mail" id="mail">
                </div>

                <div class="mb-3 container__link">
                    <button type="submit" class="btn btn-dark container__link--submit"><i class="fa-solid fa-database p-2"></i>Save</button>
                    <button type="reset" class="btn btn-dark container__link--submit"><i class="fa-solid fa-rotate p-2"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-3 container__link">
        <a class="btn btn-dark" data-bs-toggle="tooltip" data-bs-title="Previous" href="{{ route('authors.index') }}"><i class="fa-solid fa-backward-step"></i></a>
    </div>
</div>
@endsection