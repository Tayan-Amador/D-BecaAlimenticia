<?php

namespace App\Models\Alumnos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $fillable = [
        'expediente',
        'nombre',
        'correo',
        'carrera',
        'semestre',
        'telefono',
        'status',
        'huella', 
    ];
}
