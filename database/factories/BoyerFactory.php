<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Function\ToolBar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boyer>
 */
class BoyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(rand(5, 10)),
            'secondName' => Str::random(rand(5, 10)),
            'locked' => (bool)rand(0, 1),
            'phone' => ToolBar::randPhone(),
            'email' => Str::random(rand(5, 10)) . '@' . Str::random(5) . '.com'
        ];
    }
}
