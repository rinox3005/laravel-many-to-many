<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $new_project_technology = new ProjectTechnology();

            $new_project_technology->project_id = Project::inRandomOrder()->first()->id;

            $new_project_technology->technology_id = Technology::inRandomOrder()->first()->id;

            $new_project_technology->save();
        }
    }
}
