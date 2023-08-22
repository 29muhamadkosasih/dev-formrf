<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    use HasFactory;
    protected $table = 'rujukan';
    protected $guarded = [];

    public function rujukan()
    {
        return $this->hasMany(Form::class);
    }
}
