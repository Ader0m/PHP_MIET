<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\FileHelpers;

class Boyer extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'boyers';
    protected $guarded = false;

    public function adresses()
    {
        return $this->hasMany(Adress::class);
    }
}
