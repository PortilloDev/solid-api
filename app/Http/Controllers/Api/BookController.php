<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Auth::user()->books()->with('category', 'tags', 'user')->get();

        return response()->json(['data' => BookResource::collection($books)]);
    }

    public function store(CreateBookRequest $request): JsonResponse
    {
        $book = $request->user()->books()->create($request->all());

        if ($tags = json_decode($request->tags)) {
            $book->tags()->attach($tags);
        }

        $book->image_thumbnail = $request->file('image')->store('books', 'public');
        $book->save();

        return response()->json(new BookResource($book), Response::HTTP_CREATED);
    }

    public function show(Book $book): JsonResponse
    {
        $this->authorize('show', $book);

        $book =$book->load('category', 'tags', 'user');
        return response()->json(new BookResource($book));
    }

    public function update(Book $book, UpdateBookRequest $request): JsonResponse
    {
        $this->authorize('update', $book);

        $book->update($request->all());

        if ($tags = json_decode($request->tags)) {
            $book->tags()->sync($tags);
        }

        if ($request->file('image')) {
            $book->image_thumbnail = $request->file('image')->store('books', 'public');
            $book->save();
        }

        return response()->json(new BookResource($book), Response::HTTP_OK);
    }

    public function destroy(Book $book): JsonResponse
    {
        $this->authorize('delete', $book);

        $book->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
