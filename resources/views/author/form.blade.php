@extends('layout.app')

@section('title', 'Add an Author')


@section('content')

<div class="main">
    <form action="" class="myForm" method="GEt">
        @csrf
        <imput type="text" class="lastname" id="lastname" name="lastname">
        <input type="text" class="firstname" id="firstname" name="firstname">
        <input type="date" class="birth" name="birth" id="birth">
        <input type="submit" value="Save" name="submit">
    </form>
</div>

@endsection