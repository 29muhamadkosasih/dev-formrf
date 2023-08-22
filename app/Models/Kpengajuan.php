<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpengajuan extends Model
{
    use HasFactory;
    protected $table = 'kpengajuan';
    protected $guarded = [];


    public function kpengajuan()
    {
        return $this->hasMany(Form::class);
    }
}
