<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return response()->json(['data' => new CategoryCollection($categories)]);
    }

    public function store(Request $request): void
    {

    }

    public function show(Category $category): JsonResponse
    {
        $category = $category->load('books.category', 'books.tags', 'books.user');
        return response()->json(new CategoryResource($category));
    }

    public function update(Request $request): void
    {

    }

    public function delete(Request $request): void
    {

    }
}
