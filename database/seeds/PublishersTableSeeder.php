<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            'name' => 'Allen & Unwin',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('publishers')->insert([
            'name' => 'Arthur A. Levine',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('publishers')->insert([
            'name' => 'Bloomsbury',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('publishers')->insert([
            'name' => 'Atria Books ',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('publishers')->insert([
            'id' => 5,
            'name' => 'CreateSpace Independent Publishing Platform',
            'user_id' => 1,
            'created_at' => '2020-2-27 05:24:34',
            'updated_at' => '2020-2-27 05:24:34',
        ]);
        DB::table('publishers')->insert([
            'id' => 6,
            'name' => 'Albatross Publishers (March 14, 2017)',
            'user_id' => 1,
            'created_at' => '2020-2-27 05:24:34',
            'updated_at' => '2020-2-27 05:24:34',
        ]);
    }
}
