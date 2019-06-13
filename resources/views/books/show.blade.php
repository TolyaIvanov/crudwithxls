@extends('base')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show book info</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="flex-column">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $book->id }}
        </div>
        <div class="form-group">
            <strong>Author name:</strong>
            {{ $book->author->name }}
        </div>
        <div class="form-group">
            <strong>Author surname:</strong>
            {{ $book->author->surname }}
        </div>
        <div class="form-group">
            <strong>Author patronymic:</strong>
            {{ $book->author->patronymic }}
        </div>
        <div class="form-group">
            <strong>Author country:</strong>
            {{ $book->author->country }}
        </div>
        <div class="form-group">
            <strong>Book title:</strong>
            {{ $book->title }}
        </div>
        <div class="form-group">
            <strong>Book issuer:</strong>
            {{ $book->issuer }}
        </div>
        <div class="form-group">
            <strong>Book year:</strong>
            {{ $book->year }}
        </div>
        <div class="form-group">
            <strong>Book pages:</strong>
            {{ $book->pages }}
        </div>
        <div class="form-group">
            <strong>Book cover:</strong>
            {{ $book->cover }}
        </div>
    </div>
@endsection