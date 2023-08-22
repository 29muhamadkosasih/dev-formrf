<?php

namespace App\Imports;

use App\Models\User;
use App\Models\NoRek;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class DatabaseUsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dd($row);
        return new NoRek([
            'nama_penerima' => $row[0],
            'bank_id' => $row[1],
            'no_rekening' => $row[2],
        ]);
    }
}


//php artisan make:import SiswaImport --model=Siswa