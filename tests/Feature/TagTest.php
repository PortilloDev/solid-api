<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    public function test_index(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $tags = Tag::factory(5)->create();

        $response = $this->getJson('/api/tags');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' => ['name']
                    ]
                ]
            ]);
        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $tag = Tag::factory()->create();

        $response = $this->getJson('/api/tags/' . $tag->id);

        $response->assertStatus(Response::HTTP_OK) ->assertJsonStructure([
            'id',
            'type',
            'attributes' => ['name']
        ]);
    }
}
