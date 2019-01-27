<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 1,
        ]);
//////////////////////////////////////////////////////////////////
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 2,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 2,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 2,
        ]);

        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 2,
        ]);
        ///////////////////////////////////////////////////////////
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 3,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 3,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 3,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 3,
        ]);
        ///////////////////////////////////////////////////////////////
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 4,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 4,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 4,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 4,
        ]);
        DB::table('projects')->insert([
            'name' => str_random(5),
            'description' => str_random(15),
            'image_path' => "",
            'user_id' => 4,
        ]);
    }
}
