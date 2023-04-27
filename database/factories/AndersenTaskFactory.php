<?php

namespace Database\Factories;

use App\Models\AndersenTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AndersenTask>
 */
class AndersenTaskFactory extends Factory
{
    protected $model = AndersenTask::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'message' => fake()->sentence(),
        ];
    }
}
