<?php

namespace App\Exports;

use App\Models\ReportPPH23;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportPPH23Export implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('reportpph23')
            ->select(
                'client',
                'no_invoice',
                'bruto',
                'payment_in',
                'paid_date',
                'pph23',
                'npwp',
                'masa_pajak',
                'no_bukpot',
                'tgl_pemotongan',
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'client',
            'no_invoice',
            'bruto',
            'payment_in',
            'paid_date',
            'pph23',
            'npwp',
            'masa_pajak',
            'no_bukpot',
            'tgl_pemotongan',
        ];
    }
}