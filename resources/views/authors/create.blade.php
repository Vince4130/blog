@extends('layouts.app')

@section('title', 'Add an Author')

@section('content')

    <form action="{{ route('authors.store') }}" class="myForm" method="POST">
        @csrf
        <label for="lastname">Lastname :</label>
        <input type="text" class="lastname" id="lastname" name="lastname">
        <label for="firstname">Firstname :</label>
        <input type="text" class="firstname" id="firstname" name="firstname">
        <label for="birth">Birthdate :</label>
        <input type="date" class="birth" name="birth" id="birth">
        <input type="submit" value="Save">
    </form>

@endsection
