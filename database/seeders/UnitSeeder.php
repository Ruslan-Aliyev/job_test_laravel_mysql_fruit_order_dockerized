<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'unit' => 'Pcs',
        ]);
        DB::table('units')->insert([
            'unit' => 'Pack',
        ]);
        DB::table('units')->insert([
            'unit' => 'Kg',
        ]);
    }
}
