<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
        [
            'nama_bank' => 'BANK RAKYAT INDONESIA',

        ],
        [
            'nama_bank' => 'BANK MANDIRI',

        ],
        [
            'nama_bank' => 'BANK NEGARA INDONESIA',

        ],
        [
            'nama_bank' => 'BANK TABUNGAN NEGARA',

        ],
        [
            'nama_bank' => 'BANK DANAMON INDONESIA',

        ],
        [
            'nama_bank' => 'BANK PERMATA',

        ],
        [
            'nama_bank' => 'BANK CENTRAL ASIA',

        ],
        [
            'nama_bank' => 'BANK MAYBANK INDONESIA',

        ],
        [
            'nama_bank' => 'BANK CIMB NIAGA',

        ],
        [
            'nama_bank' => 'BANK UOB INDONESIA',

        ],
        [
            'nama_bank' => 'BANK OCBC NISP',

        ],
        [
            'nama_bank' => 'BANK MAYAPADA INTERNATIONAL',

        ],
        [
            'nama_bank' => 'BANK MEGA',

        ],
        [
            'nama_bank' => 'BANK KEB HANA INDONESIA',

        ],
        [
            'nama_bank' => 'BANK JAGO',

        ],
        [
            'nama_bank' => 'BANK SYARIAH INDONESIA',

        ],
        [
            'nama_bank' => 'BANK BCA SYARIAH',

        ],
        [
            'nama_bank' => 'BANK MEGA SYARIAH',
        ]
    ];
    Bank::insert($bank);
    }
}