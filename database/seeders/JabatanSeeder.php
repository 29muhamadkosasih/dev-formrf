<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            'jabatan' => ('General'),
        ]);
        DB::table('jabatan')->insert([
            'jabatan' => ('Supervisor'),
        ]);
        DB::table('jabatan')->insert([
            'jabatan' => ('Manager'),
        ]);
        DB::table('jabatan')->insert([
            'jabatan' => ('Finance'),
        ]);
        DB::table('jabatan')->insert([
            'jabatan' => ('Cashier'),
        ]);
        DB::table('jabatan')->insert([
            'jabatan' => ('Direktor'),
        ]);
    }
}