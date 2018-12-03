<?php

use Illuminate\Database\Seeder;

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
    }
}
