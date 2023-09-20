<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplina_id',
        'nome',
        'descricao',
        'imagem',
        'ch',
        'link',
        'codigo',
    ];
}
