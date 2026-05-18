<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Edicion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('edicion')->get();

        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        $ediciones = Edicion::all();

        return view('admin.cursos.create', compact('ediciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'edicion_id' => ['required', 'unique:cursos'],
            'fecha_inicial' => ['required', 'integer', 'digits:4', 'between:2020,2100'],
            'fecha_final' => ['required', 'integer', 'digits:4', 'between:2020,2100'],
            'enlace_moddle' => ['required', 'unique:cursos'],
        ]);

        Curso::create([
            'edicion_id' => $request->edicion_id,
            'fecha_inicial' => $request->fecha_inicial,
            'fecha_final' => $request->fecha_final,
            'enlace_moddle' => $request->enlace_moddle,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
    }

    public function edit(Curso $curso)
    {
        $ediciones = Edicion::all();

        return view('admin.cursos.edit', compact('curso', 'ediciones'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'edicion_id' => ['required', Rule::unique('cursos', 'edicion_id')->ignore($curso->id)],
            'fecha_inicial' => ['required', 'integer', 'digits:4', 'between:2020,2100'],
            'fecha_final' => ['required', 'integer', 'digits:4', 'between:2020,2100'],
            'enlace_moddle' => ['required', Rule::unique('cursos', 'enlace_moddle')->ignore($curso->id)],
        ]);

        $curso->update([
            'edicion_id' => $request->edicion_id,
            'fecha_inicial' => $request->fecha_inicial,
            'fecha_final' => $request->fecha_final,
            'enlace_moddle' => $request->enlace_moddle,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito.');
    }
}
