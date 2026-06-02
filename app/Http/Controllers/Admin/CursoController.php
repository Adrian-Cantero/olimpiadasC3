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
            'curso' => ['required'],
            'num_olimpiada' => ['required', 'integer'],
            'enlace_moddle' => ['required', 'unique:cursos'],
        ]);

        Curso::create([
            'edicion_id' => $request->edicion_id,
            'curso' => $request->curso,
            'num_olimpiada' => $request->num_olimpiada,
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
            'curso' => ['required'],
            'num_olimpiada' => ['required'],
            'enlace_moddle' => ['required', Rule::unique('cursos', 'enlace_moddle')->ignore($curso->id)],
        ]);

        $curso->update([
            'edicion_id' => $request->edicion_id,
            'curso' => $request->fecha_inicial,
            'num_olimpiada' => $request->fecha_final,
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
