<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city' => 'Kyiv',
        ]);

        DB::table('cities')->insert([
            'city' => 'Lviv',
        ]);

        DB::table('cities')->insert([
            'city' => 'Donetsk',
        ]);

        DB::table('cities')->insert([
            'city' => 'Lutsk',
        ]);

        DB::table('cities')->insert([
            'city' => 'Rivne',
        ]);
    }
}
