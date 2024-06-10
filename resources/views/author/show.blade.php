@extends('layouts.app')

@section('title', 'Author n°{{ $author->id }}')

@section('content')
    <table>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Birthdate</th>
        </tr>
        <tr>
            <td><?= $author->lastname ?></td>
            <td><?= $author->firstname ?></td>
            <td><?= $author->birth ?></td>
        </tr>
    </table>
@endsection
