@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
    <table>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Birthdate</th>
        </tr>
        <?php foreach ($authors as $author) : ?>
        <tr>
            <td><?= $author->lastname ?></td>
            <td><?= $author->firstname ?></td>
            <td><?= $author->birth ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
@endsection
