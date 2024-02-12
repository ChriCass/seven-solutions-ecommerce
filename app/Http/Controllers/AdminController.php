<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    // Método para mostrar el dashboard
    public function dashboard()
    {
        $users = User::all();
        $cursos = Course::all();
        return view('admin.dashboard', compact('cursos', 'users'));
    }

    // Método para mostrar la lista de cursos
    public function indexCourses()
    {
        $cursos = Course::all();
        return view('admin.courses.index', compact('cursos'));
    }

    // Método para mostrar el formulario de creación de cursos
    public function createCourse()
    {
        $cursos = Course::all();
        $categories = Category::all();
        return view('admin.courses.create', compact('cursos', 'categories'));
    }

    // Método para almacenar un nuevo curso
    public function storeCourse(CourseRequest $request)
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
    public function editCourse(Course $course) // Asegúrate de que el nombre del parámetro sea 'course'
    {
        $categories = Category::all();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    // Método para actualizar un curso
    public function updateCourse(CourseRequest $request, Course $course)
    {
        // El CourseRequest ya maneja la validación, por lo que no es necesario
        // llamar al método validate() nuevamente.

        // Obtener los datos validados.
        $validatedData = $request->validated();

        // Asignar los nuevos valores al modelo.
        $course->fill($validatedData);

        // Comprobar si hay cambios.
        if ($course->isClean()) {
            return redirect()->back()->with('warning', 'No se realizaron cambios.');
        }

        // Guardar cambios
        $course->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito.');
    }

    // Método para eliminar un curso
    public function destroyCourse(Course $course)
    {
        $course->delete();

        // Add a flash message to the session
        session()->flash('success', 'Course deleted successfully.');

        return redirect()->route('courses.index');
    }


      // Métodos para Usuarios

    public function indexUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(UserRequest $request)
    {
        $validatedData = $request->validated();
        User::create($validatedData);
        return redirect()->route('admin.users.index');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(UserRequest $request, User $user)
    {
        $validatedData = $request->validated();
    
        // Comprueba si se proporcionó una nueva contraseña.
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
    
        $user->fill($validatedData)->save();
    
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
