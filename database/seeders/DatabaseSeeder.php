<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 5 projects, each with 10 tasks
        Project::factory(5)->create()->each(function ($project) {
            Task::factory(10)->create(['project_id' => $project->id]);
        });
    }
}