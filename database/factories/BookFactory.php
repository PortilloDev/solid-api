<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->name().', '.$this->faker->name(),
            'description' => $this->faker->text(),
            'image_smallThumbnail' => $this->faker->imageUrl(640, 480),
            'image_thumbnail' => $this->faker->imageUrl(640, 480),
            'summary' => $this->faker->text(),
            'isbn_10' => null,
            'isbn_13' => null,
            'pages' => rand(0, 1000),
            'slug' => null,
            'read' => false,
        ];
    }
}
