<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@abv.bg",
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        DB::table('users')->insert([
            'name' => "Ivan",
            'email' => "ivan@abv.bg",
			'password' => bcrypt('123456'),
            'is_admin' => 0,        ]);
        DB::table('users')->insert([
            'name' => "Stanislav",
            'email' => "stanislav@abv.bg",
			'password' => bcrypt('123456'),
            'is_admin' => 0,        ]);

        DB::table('users')->insert([
            'name' => "Gergana",
            'email' => "gergana@abv.bg",
			'password' => bcrypt('123456'),
            'is_admin' => 0,        ]);
    }
}
