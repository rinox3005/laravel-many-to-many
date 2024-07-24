<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $languages = ['PHP', 'JavaScript', 'Vue', 'Laravel', 'Java', 'C#', 'C++', 'Python'];
        $status = ['Completed', 'Pending'];

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(3); // Titolo con 3 parole
            $project->programming_language = $faker->randomElement($languages);
            $project->slug = Str::of($project->title)->slug();
            $project->status = $faker->randomElement($status);
            $project->save();
        }
    }
}
