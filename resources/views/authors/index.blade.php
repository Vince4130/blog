@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
    <table>
        <tr>
            <th>#</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Birthdate</th>
        </tr>
        <?php foreach ($authors as $author) : ?>
        <tr>
            <td><a href="{{ route('authors.show', compact('author')) }}"><?= $author->id ?></a></td>
            <td><?= $author->lastname ?></td>
            <td><?= $author->firstname ?></td>
            <td><?= $author->birth ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="{{ route('authors.create') }}">Add an Author</a>
    <a href="{{ route('home') }}">Home</a>
@endsection
