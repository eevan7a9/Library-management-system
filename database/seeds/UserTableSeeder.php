<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin_name',
            'last_name' => 'admin_last',
            'username' => 'admin_username',
            'email' => 'admin@email.com',
            'status' => 1,
            'user_type' => 2,
            'password' => bcrypt('password'),
            'created_at' => '2018-09-13 05:21:34',
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'naruto',
            'last_name' => 'uzumaki',
            'username' => 'naruuzum',
            'email' => 'naruto@email.net',
            'status' => 1,
            'user_type' => 1,
            'password' => bcrypt('secret'),
            'created_at' => '2018-11-21 09:24:34',
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Saitama',
            'last_name' => 'master',
            'username' => 'saimaster',
            'email' => 'saimaster@email.com',
            'status' => 1,
            'user_type' => 0,
            'password' => bcrypt('secret'),
            'created_at' => '2018-11-30 09:24:34',
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'janedoe',
            'email' => 'janedoe@email.com',
            'status' => 1,
            'user_type' => 0,
            'password' => bcrypt('secret'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Traxex',
            'last_name' => 'Drow',
            'username' => 'Drow_Ranger',
            'email' => 'fakemail@email.com',
            'status' => 1,
            'user_type' => 1,
            'password' => bcrypt('secret'),
            'created_at' => '2018-11-10 09:24:34',
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@email.com',
            'status' => 1,
            'user_type' => 0,
            'password' => bcrypt('secret'),
            'created_at' => '2018-11-10 09:24:34',
            'updated_at' => now(),
        ]);

    }
}
