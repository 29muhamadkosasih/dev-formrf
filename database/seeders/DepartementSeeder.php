<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-Marketing'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-Admin'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-Operation'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-General Affair'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-Finance'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-LSP'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-HR'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TDP-Business Development'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('MK3-Admin'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('MK3-Operation'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('MK3-General'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TTI-Admin'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TTI-Marketing'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TTI-Project'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TTI-General'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TKKI-Admin'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TKKI-Marketing'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TKKI-General'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TKKI-Project'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TIDP-Project'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TIDP-General'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TK2I-Project'),
        ]);
        DB::table('departement')->insert([
            'nama_departement' => ('TK2I-General'),
        ]);

    }
}