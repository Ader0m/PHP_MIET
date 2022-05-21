<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adress>
 */
class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tag' => '',
            'city' => Str::random(rand(5, 10)),
            'street' => Str::random(rand(5, 10)),
            'building' => Str::random(rand(5, 10)),
            'floor' => rand(1, 20),
            'apartment number' => rand(1, 100),
            'intercom code' => Str::random(5),
            'boyer_id' => rand(1, 100)
        ];
    }
}
