<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'fictional',
            'status' => 1,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'fantasy',
            'status' => 1,
            'user_id' => 5,
            'created_at' => '2018-11-30 09:24:34',
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Science',
            'status' => 1,
            'user_id' => 2,
            'created_at' => '2018-11-20 05:24:34',
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Classic Literature',
            'status' => 1,
            'user_id' => 1,
            'created_at' => '2020-2-27 05:24:34',
            'updated_at' => '2020-2-27 05:24:34',
        ]);
    }
}
