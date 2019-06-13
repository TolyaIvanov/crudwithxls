@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h2 class="display-3">Books</h2>
            <div class="d-flex flex-row justify-content-between">
                <a style="margin: 25px;" href="{{ route('books.create')}}" class="btn btn-primary">New book</a>
                <a style="margin: 25px;" href="{{ route('books.download')}}" class="btn btn-primary">Download excel</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Author name</td>
                <td>Author country</td>
                <td>Book title</td>
                <td>Book issuer</td>
                <td>Year</td>
                <td>Pages</td>
                <td>Cover</td>
                <td colspan=3>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->author->name}} {{$book->author->surname}} {{$book->author->patronymic}}</td>
                    <td>{{$book->author->country}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->issuer}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->pages}}</td>
                    <td>{{$book->cover}}</td>
                    <td>
                        <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('books.show',$book->id)}}" class="btn btn-info">Show</a>
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection