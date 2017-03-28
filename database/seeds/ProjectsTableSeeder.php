<?php

use Illuminate\Database\Seeder;
use App\Project;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = \Faker\Factory::create();
        foreach ((range(1,30))as $index){
            Project::create([
                'name' => $faker->word(),
                'created_date' => $faker->date('Y-m-d'),
                'description' => 'fikytfkut',
                'user' => 1,
                'deadline' => \Carbon\Carbon::tomorrow()
            ]);
        }


    }
}
