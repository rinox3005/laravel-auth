<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $types = ['Front-End', 'Back-End', 'Full-Stack'];
        $languages = ['PHP', 'JavaScript', 'Vue', 'Laravel', 'Java', 'C#', 'C++', 'Python'];

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(3); // Titolo con 3 parole
            $project->type = $faker->randomElement($types);
            $project->programming_language = $faker->randomElement($languages);
            $project->save();
        }
    }
}
