@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="container">
        @include('flash-message')
        <div class="card">
            <div class="card-body bg-light">
                <h4>Authors</h4>
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
                            <th><a class="navbar-brand" href="{{ route('authors.show', $author) }}"><i
                                        class="fa-solid fa-circle-user fa-xl"></i></i></a></th>
                            <th><a class="navbar-brand" href="{{ route('authors.destroy', $author) }}"><i
                                        class="fa-regular fa-trash-can fa-lg"></i></a></th>
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
        <div class="mb-3 list__submit">
            <a class="btn btn-dark" href="{{ route('authors.create') }}"><i class="fa-solid fa-user-plus fa-lg p-2"></i>Add
                an Author</a>
            <a class="btn btn-dark" href="{{ route('articles.index') }}"><i
                    class="fa-solid fa-newspaper fa-lg p-2"></i>Articles</a>
            <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-home fa-xl"></i></a>
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
