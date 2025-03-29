<?php

namespace App\Http\Controllers\Alumnos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumnos\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('dashboard.alumnos.listado-alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $alumno = $id ? Alumno::findOrFail($id) : null;
        return view('dashboard.alumnos.registro-alumno', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'expediente' => 'required|unique:alumnos,expediente', // Asegura que el expediente sea único
            'nombre' => 'required',
            'correo' => 'required|email', // Valida que sea un correo electrónico
            'telefono' => 'required',
            'carrera' => 'required',
        ]);

        Alumno::create([
            'expediente' => $request->expediente,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera,
        ]);

        return redirect()->route('alumnos.registro')->with('success', 'Alumno registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Este método no está implementado, si lo necesitas puedes agregarlo
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.editar', compact('alumno')); // Vista para editar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'expediente' => 'required|unique:alumnos,expediente,' . $id, // Asegura que el expediente sea único, excepto para el alumno actual
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'carrera' => 'required',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return redirect()->route('alumnos.listado')->with('success', 'Alumno actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumnos.listado')->with('success', 'Alumno eliminado con éxito');
    }

    public function toggleStatus($id)
    {
        $alumno = Alumno::find($id);
        $alumno->status = ($alumno->status == 'activo') ? 'inactivo' : 'activo';
        $alumno->save();

        return redirect()->route('alumnos.listado')->with('success', 'Estado del alumno actualizado');
    }
}
