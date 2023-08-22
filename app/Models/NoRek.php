<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoRek extends Model
{
    use HasFactory;
    protected $table = 'norek';
    protected $guarded = [];

    public function norek()
    {
        return $this->hasMany(Form::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function userNorek()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
