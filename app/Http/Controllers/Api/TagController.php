<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TagController extends Controller
{
    public function index(): JsonResponse
    {
        $tags = Tag::with('books.category', 'books.tags', 'books.user')->get();

        return response()->json(['data' =>  new TagCollection($tags)]);
    }


    public function store(Request $request): void
    {

    }
    public function show(Tag $tag): JsonResponse
    {
        $tag = $tag->load('books.category', 'books.tags', 'books.user');
        return response()->json(new TagResource($tag));
    }

    public function update(Request $request): void
    {

    }

    public function delete(Request $request): void
    {

    }
}
