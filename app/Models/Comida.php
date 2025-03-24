<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use HasFactory;
    protected $table = 'comidas';
    protected $fillable = [
        'alumno_id',
        'fecha',
        'comida',
        'status',
    ];
}
