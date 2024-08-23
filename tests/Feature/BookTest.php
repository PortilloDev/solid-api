<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    public function test_index(): void
    {
        Sanctum::actingAs(User::factory()->create());

        Category::factory()->create();
        Book::factory(3)->create();
        $response = $this->getJson('/api/books');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' => ['title', 'description']
                    ]
                ]
            ]);
        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $book = Book::factory()->create();
        $response = $this->getJson('/api/books/' . $book->id);

        $response->assertStatus(Response::HTTP_OK) ->assertJsonStructure([
            'id',
            'type',
            'attributes' => ['title', 'description']
        ]);
    }

    public function test_destroy(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $book = Book::factory()->create();
        $response = $this->deleteJson('/api/books/' . $book->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_store(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $tag = Tag::factory()->create();

        $book = [
            'category_id' => $category->id,
            'tags' => $tag->id,
            'title' => 'title',
            'description' => 'description',
            'image' => UploadedFile::fake()->image('image.png'),
            'author' => 'author',

        ];
        $response = $this->postJson('/api/books/', $book);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_update(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $tag = Tag::factory()->create();

        $data = [
            'category_id' => $category->id,
            'tags' => $tag->id,
            'title' => 'title',
            'description' => 'description',
            'image' => UploadedFile::fake()->image('image.png'),
            'author' => 'author',

        ];
        $response = $this->postJson('/api/books/', $data);
        $data = [
            'category_id' => $category->id,
            'title' => 'title2',
            'description' => 'description',
            'author' => 'author',
            'read' => true,
        ];
        $book = json_decode($response->getContent(), true);
        $response = $this->patchJson('/api/books/'.$book['id'], $data);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('books', [
            'title' => 'title2'
        ]);
    }
}
