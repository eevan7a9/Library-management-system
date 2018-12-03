<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelves')->insert([
            'name' => 'Section 1',
            'status' => 1,
            'user_id' => 2,
            'created_at' => '2018-11-30 09:24:34',
            'updated_at' => now(),
        ]);
        DB::table('shelves')->insert([
            'name' => 'Section 2',
            'status' => 1,
            'user_id' => 5,
            'created_at' => '2018-11-30 09:24:34',
            'updated_at' => now(),
        ]);
    }
}
