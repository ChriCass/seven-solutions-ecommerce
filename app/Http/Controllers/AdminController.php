<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Asegúrate de importar tu modelo Curso

class AdminController extends Controller
{
    // Método para mostrar el dashboard
    public function dashboard()
    {
        $cursos = Course::all();
        return view('admin.dashboard', compact('cursos'));
    }

    // Método para mostrar la lista de cursos
    public function index()
    {
        $cursos = Course::all();
        return view('admin.courses.index', compact('cursos'));
    }

    // Método para mostrar el formulario de creación de cursos
    public function create()
    {    $cursos = Course::all();
        return view('admin.courses.create', compact('cursos'));
    }

    // Método para almacenar un nuevo curso
    public function store(Request $request)
    {
        $datosCurso = $request->validate([
            // Valida los campos necesarios
        ]);
        Course::create($datosCurso);
        return redirect()->route('admin.courses.index');
    }

    // Método para mostrar el formulario de edición de cursos
    public function edit(Course $curso)
    {
        return view('admin.courses.edit', compact('curso'));
    }

    // Método para actualizar un curso
    public function update(Request $request, Course $curso)
    {
        $datosCurso = $request->validate([
            // Valida los campos necesarios
        ]);
        $curso->update($datosCurso);
        return redirect()->route('admin.courses.index');
    }

    // Método para eliminar un curso
    public function destroy(Course $curso)
    {
        $curso->delete();
        return redirect()->route('admin.courses.index');
    }
}

