@extends('layouts.app')

@section('title', 'Author')

@section('content')

    <div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Author Details</h4>
            <table id="author__table" class="table table-striped authortable">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Nickname</th>
                        <th>Edit</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $author->lastname ?></td>
                        <td><?= $author->firstname ?></td>
                        <td><?= isset($author->nickname) ?  $author->nickname : 'N/A' ?></td>
                        <td><a class="navbar-brand" href="{{ route('authors.edit', $author) }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a></td>
                        <td><a class="navbar-brand" href="mailto:<?= isset($author->mail) ? $author->mail : ''?>"><i class="fa-solid fa-envelope fa-lg"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 list__submit">
        <a class="btn btn-dark" href=""><i class="fa-solid fa-folder-plus fa-lg p-2"></i>Add an article</a>
        <a class="btn btn-dark" href="{{ route('authors.index') }}"><i class="fa-solid fa-rotate-left white p-2"></i>Back</a>
    </div>
</div>
@endsection

