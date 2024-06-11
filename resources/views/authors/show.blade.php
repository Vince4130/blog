@extends('layouts.app')

@section('title', 'Author')

@section('content')
    <table>
        <tr>
            <th>#</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Birthdate</th>
        </tr>
        <tr>
            <td><?= $author->id ?></td>
            <td><?= $author->lastname ?></td>
            <td><?= $author->firstname ?></td>
            <td><?= $author->birth ?></td>
        </tr>
    </table>
        <button type="button" onclick=window.location.href="{{ route('authors.edit', $author) }}">Edit</button>
        <button type="button" onclick=window.location.href="{{ route('authors.index') }}">Back</button>
 
@endsection
