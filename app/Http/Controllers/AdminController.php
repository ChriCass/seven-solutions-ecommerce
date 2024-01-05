<?php
namespace App\Http\Controllers;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Models\Course; // Asegúrate de importar tu modelo Curso
use App\Models\Category; 
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
        $categories = Category::all();
        return view('admin.courses.create', compact('cursos', 'categories'));
    }

    // Método para almacenar un nuevo curso
    public function store(CourseRequest $request)
    {
        $datosCurso = $request->validated();
        
        // Procesar el archivo thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('public/thumbnails', $thumbnailName);
            $datosCurso['thumbnail'] = $thumbnailPath;
        }
    
        // Procesar el archivo video
        if ($request->hasFile('video_url')) {
            $video = $request->file('video_url');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/videos', $videoName);
            $datosCurso['video_url'] = $videoPath;
        }
    
        // Crear el curso con los datos validados y los archivos cargados
        Course::create($datosCurso);
    
        // Redirigir a la página de índice de cursos del administrador
        return redirect()->route('courses.index');
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

