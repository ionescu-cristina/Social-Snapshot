<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), 
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text, 
            'date_posted' => $this->faker->dateTime,
            'social_network' => $this->faker->randomElement(['Facebook', 'Twitter']),
            'original_link' => $this->faker->url,
        ];
    }
}
