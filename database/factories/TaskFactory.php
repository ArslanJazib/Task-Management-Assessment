<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4), // Generates a random task name
            'priority' => $this->faker->numberBetween(1, 10), // Generates a random priority between 1 and 10
            'project_id' => Project::factory(), // Associates the task with a random project
        ];
    }
}