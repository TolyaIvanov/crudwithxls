@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a book</h1>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('books.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Author name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="surname">Author surname:</label>
                        <input type="text" class="form-control" name="surname"/>
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Author patronymic:</label>
                        <input type="text" class="form-control" name="patronymic"/>
                    </div>
                    <div class="form-group">
                        <label for="country">Author country:</label>
                        <input type="text" class="form-control" name="country"/>
                    </div>

                    <div class="form-group">
                        <label for="title">Book title:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="issuer">Book issuer:</label>
                        <input type="text" class="form-control" name="issuer"/>
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="text" class="form-control" name="year"/>
                    </div>
                    <div class="form-group">
                        <label for="pages">Pages:</label>
                        <input type="text" class="form-control" name="pages"/>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover:</label>
                        <select name="cover" class="form-control">
                            <option value="solid">Solid</option>
                            <option value="soft">Soft</option>
                        </select>
                    </div>
                    <button style="margin-bottom: 50px;" type="submit" class="btn btn-success">Add book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
