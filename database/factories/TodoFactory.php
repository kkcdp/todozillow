<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'todoname' => fake()->text(10),
            'deadlinedate' => fake()->date($format = 'Y-m-d', $min = 'now'),
            'deadlinetime' => fake()->time($format = 'H:i'),
            'importance' => fake()->boolean(),
            'description' => fake()->text(180),
            'by_user_id' => 1,
            'by_group_id' => 1,
            'isDone' => false
        ];
    }
}
