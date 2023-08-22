<?php

namespace Database\Seeders;

use App\Models\NoRek;
use Illuminate\Database\Seeder;

class NoRekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
           [
            'bank_id' => '1',
            'user_id'=>'1',
            'no_rekening' => '0949902000013',
            'nama_penerima'   =>'Muhamad Kosasih',
           ],
           [
            'bank_id' => '2',
            'user_id' => '1',
            'no_rekening' => '020444233411',
            'nama_penerima'   =>'Bayu',

            ],
            [
                'bank_id' => '3',
                'user_id' => '1',
                'no_rekening' => '00023233202',
                'nama_penerima' => 'Fadillah',

            ],
            [
                'bank_id' => '4',
                'user_id' => '1',
                'no_rekening' => '0909420223211',
                'nama_penerima' => 'Juki',

            ],
            [
                'bank_id' => '5',
                'user_id' => '1',
                'no_rekening' => '023123212122',
                'nama_penerima' => 'Yahya',

            ], [
                'bank_id' => '6',
                'user_id' => '1',
                'no_rekening' => '022232122221',
                'nama_penerima' => 'John Doe',

            ],
            [
                'bank_id' => '7',
                'user_id' => '1',
                'no_rekening' => '02111100000',
                'nama_penerima' => 'Kimid',

            ],
            [
                'bank_id' => '4',
                'user_id' => '1',
                'no_rekening' => '01001010100000',
                'nama_penerima' => 'Max',

            ],
        ];

           NoRek::insert($name);

       }
}
