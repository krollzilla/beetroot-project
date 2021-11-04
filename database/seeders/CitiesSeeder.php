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
            //'created_at' => getdate()
        ]);

        DB::table('cities')->insert([
            'city' => 'Lviv',
            //'created_at' => getdate()
        ]);

        DB::table('cities')->insert([
            'city' => 'Donetsk',
           // 'created_at' => getdate()
        ]);

        DB::table('cities')->insert([
            'city' => 'Lutsk',
            //'created_at' => getdate()
        ]);

        DB::table('cities')->insert([
            'city' => 'Rivne',
           // 'created_at' => getdate()
        ]);
    }
}
