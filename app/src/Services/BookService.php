<?php

namespace App\Src\Services;

use App\Models\Book;
use App\Models\User;
use App\Src\Repository\BookServiceInterface;

class BookService implements BookServiceInterface
{
    public function createBook(array $data, User $user): Book
    {
        $book = $user->books()->create($data);
        if (isset($data['tags'])) {
            $book->tags()->attach($data['tags']);
        }
        return $book;
    }

    public function updateBook(Book $book, array $data): Book
    {
        $book->update($data);
        if (isset($data['tags'])) {
            $book->tags()->sync($data['tags']);
        }
        return $book;
    }

    public function storeBookImage(Book $book, mixed $image): Book
    {
        if ($image !== null) {
            $book->image_thumbnail = $image->store('books', 'public');
            $book->save();
        }

        return $book;
    }
}