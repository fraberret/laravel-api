<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(4, true);
            $project->slug = Str::of($project->title)->slug('-');
            $project->description = $faker->text(400);
            $project->project_link = $faker->url();
            $project->cover_image = $faker->imageUrl(600, 300, 'Project', $project->title);
            $project->save();
        }
    }
}
