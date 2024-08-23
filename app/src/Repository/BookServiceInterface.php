<?php

namespace App\Src\Repository;

use App\Models\Book;
use App\Models\User;

interface BookServiceInterface
{
    public function createBook(array $data, User $user): Book;
    public function updateBook(Book $book, array $data): Book;
    public function storeBookImage(Book $book, mixed $image): Book;

}