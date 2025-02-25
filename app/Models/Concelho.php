<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concelho extends Model
{
    use HasFactory;

    protected $table = 'concelho';

    public function filtro_concelho($distrito)
    {
        return DB::select('CALL filtro_concelho(?)', array($distrito));
    }

    protected $fillable = [
        'id_concelho',
        'nome',
        'id_freguesia',
    ];

    
}
