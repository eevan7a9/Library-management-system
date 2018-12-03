<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Jeraiya',
            'user_id' => 2,
            'created_at' => '2018-11-15 01:23:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'name' => 'J. K. Rowling',
            'user_id' => 2,
            'created_at' => '2018-11-30 09:14:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'name' => 'George R. R. Martin',
            'user_id' => 5,
            'created_at' => '2018-11-25 06:21:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'name' => 'J. R. R. Tolkien',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
