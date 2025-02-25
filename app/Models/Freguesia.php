<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freguesia extends Model
{
    use HasFactory;

    protected $table = 'freguesia';

    public function filtro_freguesia($concelho)
    {
        return DB::select('CALL filtro_freguesia(?)', array($concelho));
    }
}
