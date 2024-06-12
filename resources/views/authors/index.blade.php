@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
    <table>
        <tr>
            {{-- <th>#</th> --}}
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Birthdate</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($authors as $author) : ?>
        <tr>
            {{-- <td><?= $author->id ?></td> --}}
            <td><?= $author->lastname ?></td>
            <td><?= $author->firstname ?></td>
            <td><?= $author->birth ?></td>
            <th><a href='{{ route('authors.show', $author) }}'>Details</a></th>
            <th><a href='{{ route('authors.destroy', $author) }}'>Trash</a></th>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="{{ route('authors.create') }}">Add an Author</a>
    <a href="{{ route('authors.home') }}">Home</a>
@endsection
