<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

use App\Models\Category;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $categories = Category::factory(5)->create();

        $response = $this->getJson('/api/categories');

        $response->assertJsonCount(5, 'data')
        ->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'type',
                    'attributes' => ['name']
                ]
            ]
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();

        $response = $this->getJson('/api/categories/' . $category->id);

        $response->assertStatus(Response::HTTP_OK) ->assertJsonStructure([
                'id',
                'type',
                'attributes' => ['name']
        ]);
    }
}
