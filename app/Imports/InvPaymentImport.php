<?php

namespace App\Imports;

use App\Models\InvPayment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class InvPaymentImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new InvPayment([
            'no_project' => $row[1],
            'pic_client' => $row[2],
            'no_invoice' => $row[3],
            'date_invoice' => $row[4],
            'amount_invoice' => $row[5],
            'due_date' => $row[6],
            'payment_in' => $row[7],
            'paid_date' => $row[8],
            'deduction' => $row[9],
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}