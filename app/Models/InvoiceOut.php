<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOut extends Model
{
    use HasFactory;
    protected $table = 'invoice_out';
    protected $guarded = [];

    public static function generateInvoiceNumber()
    {
        $lastOrder = InvoiceOut::orderBy('id', 'desc')->first();
        $lastInvoiceNumber = $lastOrder ? $lastOrder->no_invoice : null;

        if ($lastInvoiceNumber && strpos($lastInvoiceNumber) !== false) {
            // Jika nomor invoice tahun ini sudah ada, tambahkan 1 ke nomor berurut
            $lastInvoiceNumber = intval(substr($lastInvoiceNumber, -3));
            $newInvoiceNumber = sprintf('INV-%s-%03d', $lastInvoiceNumber + 1);
        } else {
            // Jika nomor invoice tahun ini belum ada, mulai dari 001
            $newInvoiceNumber = sprintf('INV-%s-%03d', 1);
        }

        return $newInvoiceNumber;
    }
}