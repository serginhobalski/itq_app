<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'aluno_id',
    ];
}
