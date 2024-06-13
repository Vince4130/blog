@extends('layouts.app')

@section('title', 'Author')

@section('content')

    <div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Authors List</h4>
            <!-- Liste -->
            <table id="author__table" class="table table-striped authortable">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Birthdate</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td><?= $author->id ?></td> --}}
                        <td><?= $author->lastname ?></td>
                        <td><?= $author->firstname ?></td>
                        <td><?= $author->birth ?></td>
                        <td><a class="navbar-brand" href="{{ route('authors.edit', $author) }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 list__submit">
        <a class="navbar-brand" href="{{ route('authors.index') }}"><i class="fas fa-home"></i></a>
    </div>
</div>
@endsection

