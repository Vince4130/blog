@extends('layouts.app')

@section('title', 'Authors List')

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
                        <th>Show</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($authors as $author) : ?>
                        <tr>
                            {{-- <td><?= $author->id ?></td> --}}
                            <td><?= $author->lastname ?></td>
                            <td><?= $author->firstname ?></td>
                            <td><?= $author->birth ?></td>
                            <th><a class="navbar-brand" href="{{ route('authors.show', $author) }}"><i class="fa-solid fa-circle-user fa-xl"></i></i></a></th>
                            <th><a class="navbar-brand" href="{{ route('authors.destroy', $author) }}"><i class="fa-regular fa-trash-can fa-lg"></i></a></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 list__submit">
        <a class="btn btn-dark" href="{{ route('authors.create') }}"><i class="fa-solid fa-user-plus fa-lg p-2"></i>Add an Author</a>
    </div>
</div>
<script>
    let mytable = new DataTable('#author__table', {
        order: [
            [2, 'desc']
        ],
        responsive: true
    });
</script>
@endsection