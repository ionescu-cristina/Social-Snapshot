<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SocialList;


class SocialListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SocialList::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), 
            'description' => $this->faker->sentence, 
        ];
    }
}
