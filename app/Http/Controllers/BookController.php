<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;

class BookController extends Controller
{
	public function index()
	{
        $book = Book::all();

	    return response()->json(
			$book,
			200
		);
	}

	public function show($id)
	{
		$book = Book::find($id);

		return response()->json([
			'book' => $book->toArray(),
		],200);

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
		$book = Book::find($id);
        $book->delete();

        return response()->json([
            'error' => false,
            'message' => 'book deleted',
        ],200);
	}
}
