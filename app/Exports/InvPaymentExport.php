<?php

namespace App\Exports;

use App\Models\InvPayment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvPaymentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('invpayment')
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
            'CLIENT',
            'INV NO',
            'BRUTO',
            'PAYMENT IN',
            'PAID DATE',
            'PPH 23',
            'NPWP',
            'MASA PAJAK',
            'NO BUKPOT',
            'TGL PEMOTONGAN',
        ];
    }

}