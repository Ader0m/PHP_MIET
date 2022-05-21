<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $table = 'adresses';
    protected $guarded = false;

    public function boyers(){
        return $this->belongsTo(Boyer::class, 'boyer_id', 'id');
    }
}
