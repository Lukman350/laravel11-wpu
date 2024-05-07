<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $title = $faker->sentence();

        // create 10 posts
        for ($i = 0; $i < 10; $i++) {
            Post::factory()->create([
                'title' => $title,
                'slug' => Str::slug($title)
            ]);

            $title = $faker->sentence();
        }

        // output a message to the console
        $this->command->info('Post data has been seeded!');
    }
}
