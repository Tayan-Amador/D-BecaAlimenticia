<?php

namespace App\Http\Controllers\Huellas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumnos\Alumno;

class HuellaController extends Controller
{
    public function create()
    {
        return view('pruebas.alumnos_faltantes');
    }

    public function alumnos_sinhuella(){
        try {
            $alumnosSH = Alumno::whereNull('huella')->get();
            return response()->json($alumnosSH);
        } catch (\Exception $e) {
            // Si ocurre un error, devuelve un mensaje de error con el código 500
            return response()->json(['error' => 'Ocurrió un error al obtener los alumnos.'], 500);
        }
    }

    public function asignarHuella(Request $request, $id)
    {
        // Validar los datos de la huella
        $request->validate([
            'huella_data' => 'required|string',  // Validamos que la huella esté presente como string o JSON
        ]);

        // Buscar al alumno por su ID
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado.'], 404);
        }

        // Obtener los datos de la huella
        $huellaData = $request->input('huella_data');

        // Almacenar la huella en la base de datos
        $alumno->huella = $huellaData;
        $alumno->save();

        // Responder con éxito
        return response()->json(['success' => 'Huella asignada correctamente.']);
    }

    

  
}
