<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvPayment extends Model
{
    use HasFactory;
    protected $table = 'invpayment';
    protected $guarded = [];

    public static function generateNextSequenceNumber()
    {
        $lastRecord = InvPayment::latest('no_urut')->first();

        if ($lastRecord) {
            $nextNumber = $lastRecord->no_urut + 1;
        } else {
            $nextNumber = 1;
        }

        return $nextNumber;
    }
}
