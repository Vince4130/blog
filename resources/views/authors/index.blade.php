@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="container">
        @include('flash-message')
        <div class="card">
            <div class="card-body bg-light">
                <h1 class="container__title">Authors</h1>
                <!-- Liste -->
               @if (count($authors) > 0)
                <table id="author__table" class="table table-light authortable table-hover">
                    <thead>
                        <tr>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Nickname</th>
                            <th>Email</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr>
                            <td>{{ $author->lastname }}</td>
                            <td>{{ $author->firstname}}</td>
                            <td>{{ $author->nickname ?? 'N/A' }}</td>
                            <td>{{ $author->mail != null ? $author->mail : 'N/A' }}</td>
                            <th>
                                <a class="navbar-brand" data-bs-toggle="tooltip" data-bs-title="Edit" href="{{ route('authors.show', $author) }}">
                                    <i class="fa-solid fa-circle-user fa-xl"></i>
                                </a>
                            </th>
                            <th>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#delAuthor{{ $author->id }}">
                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                </a></span>
                            </th>
                            <div class="modal fade" id="delAuthor{{ $author->id }}" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Author</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete the author {{ $author->firstname.' '.$author->lastname }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-dark" href="{{ route('authors.destroy', $author) }}">Yes</a>
                                            <a class="btn btn-dark" data-bs-dismiss="modal" aria-label="close">No</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div>
                    {{ $authors->links() }}
                </div>
                @else
                <div class="mb-3">
                    <h4>No author yet registered</h4>
                </div>
                @endif
            </div>
        </div>
        <div class="mb-3 container__link">
            <a class="btn btn-dark container__link--width" href="{{ route('authors.create') }}"><i class="fa-solid fa-user-plus fa-lg p-2"></i>Add
                an Author</a>
            <a class="btn btn-dark container__link--width" href="{{ route('articles.index') }}"><i
                    class="fa-solid fa-newspaper fa-lg p-2"></i>Articles</a>
            <a class="navbar-brand" data-bs-toggle="tooltip" data-bs-title="Home" href="{{ route('home') }}"><i class="fas fa-home fa-xl"></i></a>
        </div>
    </div>
    {{-- <script>
    let mytable = new DataTable('#author__table', {
        order: [
            [0, 'asc']
        ],
        responsive: true
    });
</script> --}}
@endsection
