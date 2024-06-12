@extends('layouts.app')

@section('title', 'Author')

@section('content')
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Birthdate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $author->id ?></td>
                <td><?= $author->lastname ?></td>
                <td><?= $author->firstname ?></td>
                <td><?= $author->birth ?></td>
            </tr>
        </tbody>
    </table>
    <a class="navbar-brand" href="{{ route('authors.edit', $author) }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
    <a class="navbar-brand" href="{{ route('authors.index') }}"><i class="fas fa-home"></i></a>

@endsection
