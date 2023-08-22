<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('form')->insert([
            'from_id' => '1',
            'departement_id' => '14',
            'to' => 'SPV',
            'ketegori_pengajuan' => 'Advance',
            'tanggal_kebutuhan' => '2023-07-22',
            'payment' => 'Cash',
            'description' => 'Meja',
            'unit' => 'Unit',
            'qty' => '2',
            'price' => '120000',
            'total' => '240000',
            'jumlah_total' => '240000',
        ]);
    }
}