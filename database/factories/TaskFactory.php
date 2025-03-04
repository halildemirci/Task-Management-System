<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskList>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => fake()->realText(50),
            'description' => fake()->realText(200),
            'status' => fake()->randomElement(['pending']),
            'user_id' => fake()->numberBetween(1, 10)
        ];
    }
}
