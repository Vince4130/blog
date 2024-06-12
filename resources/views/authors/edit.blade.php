@extends('layouts.app')

@section('title', 'Update the Author')

@section('content')

<div class="main">
    <h4>Update the Author</h4>
    <form action="{{ route('authors.update', $author) }}" class="myForm" method="POST">
        @csrf
        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname" value="{{ $author->lastname }}">
        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname" value="{{ $author->firstname }}">
        <label for="birth">Birthdate :</label>
        <input type="date" name="birth" id="birth" value="{{ $author->birth }}">
        <input type="submit" value="Update">
    </form>
</div>
@endsection