<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  public function definition(): array
  {
    return [
      'title' => fake()->sentence(),
      'author_id' => User::factory(),
      'category_id' => Category::factory(),
      'body' => fake()->paragraph(30),
      'slug' => Str::slug(fake()->sentence())
    ];
  }
}
