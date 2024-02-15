<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $userByRandom = User::all()->random();
        return [
            'title'=>fake()->title(),
            'body'=>fake()->text(500),
            'enabled'=>fake()->boolean(70),
            'slug' => Str::slug($this->faker->title),
            'user_id'=>$userByRandom->id
        ];
    }
}
