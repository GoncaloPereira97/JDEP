<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_area'); // 'id_area' deve ser a chave estrangeira na tabela 'cursos'
    }
}
