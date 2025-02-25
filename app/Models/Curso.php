<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Regiao;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Curso extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_curso',
        'nome_instituicao',
        'nivel_ensino',
        'data_inicio',
        'data_fim',
        'descricao',
        'regime_funcionamento',
        'regime_frequencia',
        'regiao',
    ];

    public function areas()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function regioes()
    {
        return $this->belongsTo(Regiao::class, 'regiao');
    }


}
