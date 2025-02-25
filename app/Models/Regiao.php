<?php

namespace App\Models;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regiao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_regiao',
        'nome',
    ];

    protected $table = 'regiao';

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'regiao'); // 'id_area' deve ser a chave estrangeira na tabela 'cursos'
    }

    
}
