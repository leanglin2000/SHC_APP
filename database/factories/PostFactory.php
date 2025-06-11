<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
    public function definition(): array
    {
        $thumnails = ['database.png', 'node.png', 'php.png', 'programming.jpg', 'python.jpeg'];
        $categories = Category::pluck('id')->toArray();
        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'thumnail' => 'upload/' . fake()->randomElement($thumnails),
            'category_id' => fake()->randomElement($categories),

        ];
    }

    public function configure()
    {
        $tags = Tag::pluck('id')->toArray();

        return $this->afterCreating(function (Post $post) use ($tags) {
            $post->tags()->sync(fake()->randomElements($tags, 2));
        });
    }
}
