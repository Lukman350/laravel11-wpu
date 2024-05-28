<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
  public function definition(): array
  {
    return [
      'title' => fake()->sentence(),
      'author' => fake()->name(),
      'body' => fake()->paragraph(40),
      'slug' => Str::slug(fake()->sentence())
    ];
  }
}
