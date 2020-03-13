<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'name' => 'Jeraiya',
            'user_id' => 2,
            'created_at' => '2018-11-15 01:23:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'id' => 2,
            'name' => 'J. K. Rowling',
            'user_id' => 2,
            'created_at' => '2018-11-30 09:14:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'id' => 3,
            'name' => 'George R. R. Martin',
            'user_id' => 5,
            'created_at' => '2018-11-25 06:21:34',
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'id' => 4,
            'name' => 'J. R. R. Tolkien',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'id' => 5,
            'name' => 'Jennifer Weiner',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('authors')->insert([
            'id' => 6,
            'name' => 'William Shakespeare',
            'user_id' => 1,
            'created_at' => '2020-3-12 06:21:34',
            'created_at' => '2020-3-12 06:21:34',
        ]);
        DB::table('authors')->insert([
            'id' => 7,
            'name' => 'Virginia Woolf',
            'user_id' => 1,
            'created_at' => '2020-2-12 06:21:34',
            'created_at' => '2020-2-12 06:21:34',
        ]);
    }
}
