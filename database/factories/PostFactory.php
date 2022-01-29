<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->realText(500);
        $excerpt = Str::words($description,10);
        return [
            'title' => $this->faker->realText(10),
            'description' => $description,
            'excerpt' => $excerpt,
            'photo' => 'images/post/default.jpg',
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
