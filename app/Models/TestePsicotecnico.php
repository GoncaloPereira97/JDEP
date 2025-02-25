<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestePsicotecnico extends Model
{
    use HasFactory;

    protected $table = 'testepsicotecnico'; // Especifique o nome da tabela, se for diferente do padrão
        
    // Defina os campos preenchíveis
    protected $fillable = [
        'perguntasarea_1',
        'perguntasarea_2',
        'perguntasarea_3',
        'perguntasarea_4',
        'perguntasarea_5',
        'perguntasarea_6',
        'perguntasarea_7',
        'perguntasarea_8',
        'resultado_um',
        'resultado_dois',
        'resultado_tres',
        'resultado_quatro',
        'resultado_cinco',
        'resultado_seis',
        'resultado_sete',
        'resultado_oito',
    ];

}

