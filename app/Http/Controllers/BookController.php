<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        if ($request->isMethod('put')) {
            $book->update($request->all());
        } elseif ($request->isMethod('patch')) {
            if ($request->has('title')) {
                $book->title = $request->input('title');
            }

            if ($request->has('author')) {
                $book->author = $request->input('author');
            }

            if ($request->has('genre')) {
                $book->genre = $request->input('genre');
            }

            $book->save();
        }

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
