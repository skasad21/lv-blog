<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'image' => $this->faker->image('public/storage/images',640,480, null, false),
            'body' => $this->faker->paragraph(10),
            'user_id' => 1,
            'category_id' => 3,
        ];
    }
}
