<?php

namespace App\Http\Controllers\Api\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Books\BookRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/books",
     *   summary="Display a listing of the resource.",
     *   security={{"basicAuth": {} }},
     *   @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="",
     *     example=2,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="books",
     *         type="object",
     *         ref="#/components/schemas/books"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401,ref="#/components/responses/401")
     * )
     */
    public function index()
    {
        $books = (new Book)->paginate(10);

        if (!$books) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(['books' => $books], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return JsonResponse
     *
     * @OA\POST(
     *   path="/api/books",
     *   summary="Store a newly created resource in storage.",
     *   security={{"basicAuth": {} }},     *
     *   @OA\RequestBody(
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(ref="#/components/schemas/bookData")
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="book",
     *         type="object",
     *         ref="#/components/schemas/book"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401,ref="#/components/responses/401")
     * )
     */
    public function store(BookRequest $request)
    {
        try {
            $book = new Book;
            $book->fill($request->validated())->save();
        } catch (Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }

        return response()->json([
            'book' => $book,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/books/{id}",
     *   summary="Display the specified resource.",
     *   security={{"basicAuth": {} }},     *
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     example=2,
     *     description="book id",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="book",
     *         type="object",
     *         ref="#/components/schemas/book"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401,ref="#/components/responses/401")
     * )
     */
    public function show($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = (new Book)->find($id);

        return response()->json([
            'book' => $book,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param int $id
     * @return JsonResponse
     *
     * @OA\PUT(
     *   path="/api/books/{id}",
     *   summary="Update the specified resource in storage.",
     *   security={{"basicAuth": {} }},     *
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     example=2,
     *     description="book id",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         ref="#/components/schemas/bookData"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="book",
     *         type="object",
     *         ref="#/components/schemas/book"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401,ref="#/components/responses/401")
     * )
     */
    public function update(BookRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $book = (new Book)->find($id);
            $book->fill($request->validated())->save();
        } catch (Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }

        return response()->json([
            'book' => $book,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     *
     * @OA\DELETE(
     *   path="/api/books/{id}",
     *   summary="Remove the specified resource from storage.",
     *   security={{"basicAuth": {} }},     *
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     example=2,
     *     description="book id",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=204,
     *     description="OK",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="book deleted"
     *       )
     *     )
     *   ),
     *   @OA\Response(response=401,ref="#/components/responses/401")
     * )
     */
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        (new Book)->find($id)->delete();

        return response()->json([
            'message' => 'book deleted',
        ], 204);
    }
}
