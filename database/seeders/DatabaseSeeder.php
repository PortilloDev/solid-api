<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create(['email' => 'i@admin.com']);
        \App\Models\User::factory(29)->create();

        \App\Models\Category::factory(12)->create();
        \App\Models\Book::factory(30)->create();
        \App\Models\Tag::factory(40)->create();

        // Many to Many

        $books = \App\Models\Book::all();
        $tags = \App\Models\Tag::all();

        foreach ($books as $book) {
            $book->tags()->attach($tags->random(rand(2,4)));
        }


    }
}
