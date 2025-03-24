<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    public function alumnos()
    {
        return view('dashboard.reportes.reporte-alumnos');
    }
    public function comidas()
    {
        return view('dashboard.reportes.comidas-entregadas');
    }
}
