<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if (!$books) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $books,
            200
        );
    }

    public function show($id)
    {
        if (!$id) {
           throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);

        return response()->json([
            $book,
        ], 200);

    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->author = $request->input('author');
        $book->editor = $request->input('editor');
        $book->save();

        return $book;
    }

    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);

        if ($request->has('title')) {
            $book->title = $request->input('title');
        }

        if ($request->has('price')) {
            $book->price = $request->input('price');
        }

        if ($request->has('author')) {
            $book->author = $request->input('author');
        }

        if ($request->has('editor')) {
            $book->editor = $request->input('editor');
        }

        $book->save();

        return $book;
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);
        $book->delete();

        return response()->json([
            'message' => 'book deleted',
        ], 200);
    }
}
