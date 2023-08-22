<?php

namespace App\Exports;

use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormPaidExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('form')
            ->with(
                'kpengajuan',
                'norek',
                'departement',
                'user',
            )
            ->select(
                'created_at',
                'user->name',
                'departement->nama_departement',
                'payment',
                'kpengajuan->name',
                'jumlah_total',
                'norek->bank->nama_bank',
                'norek->no_rekening',
                'norek->nama_penerima',
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Dari',
            'Departement',
            'Payment Method',
            'Kategori Pengajuan',
            'Jumlah (Rp)',
            'Nama Bank',
            'No Rekening',
            'Penerima',
        ];
    }
}
