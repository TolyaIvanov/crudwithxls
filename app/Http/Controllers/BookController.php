<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'surname' => 'required|string|max:150',
            'patronymic' => 'required|string|max:150',
            'country' => 'required|string|max:150',
            'title' => 'required|string|max:150',
            'issuer' => 'required|string|max:150',
            'year' => 'required|integer|max:2020',
            'pages' => 'required|integer',
        ]);

        $author = Author::firstOrNew([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'country' => $request->country,
        ]);

        $book = new Book([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'year' => $request->year,
            'pages' => $request->pages,
            'cover' => $request->cover,
        ]);

        $author->save();
        $author->book()->save($book);

        return redirect('/books')->with('success', 'Book saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'surname' => 'required|string|max:150',
            'patronymic' => 'required|string|max:150',
            'country' => 'required|string|max:150',
            'title' => 'required|string|max:150',
            'issuer' => 'required|string|max:150',
            'year' => 'required|integer|max:2020',
            'pages' => 'required|integer',
        ]);

        $book = Book::find($id);

        $book->author->name = $request->get('name');
        $book->author->surname = $request->get('surname');
        $book->author->patronymic = $request->get('patronymic');
        $book->author->country = $request->get('country');

        $book->title = $request->get('title');
        $book->issuer = $request->get('issuer');
        $book->year = $request->get('year');
        $book->pages = $request->get('pages');
        $book->cover = $request->get('cover');

        $book->save();

        return redirect('/books')->with('success', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book deleted!');
    }

    public function download()
    {
        $books = Book::all();
        $answer = [
            [
                'author name',
                'author surname',
                'author patronymic',
                'author country',
                'book title',
                'book issuer',
                'year',
                'pages',
                'cover',
            ]
        ];

        foreach ($books as $book) {
            array_push($answer, [
                $book->author->name,
                $book->author->surname,
                $book->author->patronymic,
                $book->author->country,
                $book->title,
                $book->issuer,
                $book->year,
                $book->pages,
                $book->cover,
            ]);
        }
        $export = new BooksExport($answer);

        return Excel::download($export, env('EXCEL_FILE', 'file.xlsx'));
    }
}
