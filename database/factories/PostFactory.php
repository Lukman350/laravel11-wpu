<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
  protected static ?string $title;

  public function definition(): array
  {
    return [
      'title' => static::$title ??= fake()->sentence(),
      'body' => fake()->paragraph(),
      'author' => fake()->name(),
      'slug' => Str::slug(static::$title ?? fake()->sentence())
    ];
  }
}
