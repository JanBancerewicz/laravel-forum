<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(
                fake()->numberBetween(2,10)
            ),
            'content' => fake()->text(
                fake()->numberBetween(50,150)
            ),
            'tag' => fake()->randomElement(
                Article::getAvailableTags()
            ),
            'authorId' => fake()->numberBetween(1,5)
            
        ];
    }
}
