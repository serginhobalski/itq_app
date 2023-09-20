<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogUser extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'data_inicio',
        'data_final',
    ];
}
