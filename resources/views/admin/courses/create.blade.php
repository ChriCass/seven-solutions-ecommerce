@extends('admin.layouts.top', ['useViteAssets' => true])

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="white-box">
                <h3 class="box-title">New Course Details</h3>
                <form action="{{ url('/admin/courses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Título, Precio, Idioma -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Course Title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                                    required>
                            </div>

                        </div>

                        <!-- Descripción Corta, Nivel, Categoría -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="2"
                                    placeholder="Short Description" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" id="level" name="level" placeholder="Level"
                                    required>
                            </div>

                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="form-group mb-3">
                                <label for="outcomes">Outcomes</label>
                                <textarea class="form-control" id="outcomes" name="outcomes" rows="2" placeholder="Course Outcomes" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_id">Category</label>
                                <input type="number" class="form-control" id="category_id" name="category_id"
                                    placeholder="Category ID" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            </div>
                            <div class="form-group mb-3">
                                <label for="video_url">Video URL</label>
                                <input type="file" class="form-control" id="video_url" name="video_url">
                            </div>
                        </div>

                        <!-- Visibilidad, Thumbnail, Video URL -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="visibility">Visibility</label>
                                <select class="form-select" id="visibility" name="visibility">
                                    <option value="1">Visible</option>
                                    <option value="0">Hidden</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="language">Language</label>
                                <input type="text" class="form-control" id="language" name="language"
                                    placeholder="Language" required>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="section">Section</label>
                                <textarea class="form-control" id="section" name="section" rows="2" placeholder="Course Section" required></textarea>
                            </div>
                            <!-- Requerimientos -->
                            <div class="form-group mb-3">
                                <label for="requirements">Requirements</label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="2" placeholder="Course Requirements"
                                    required></textarea>
                            </div>
                        </div>
                        <!-- Descripción Completa -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="description">Full Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Full Description"
                                    required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Envío -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Create Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Courses</h3>
                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <select class="form-select shadow-none row border-top">
                            <option>March 2021</option>
                            <option>April 2021</option>
                            <option>May 2021</option>
                            <option>June 2021</option>
                            <option>July 2021</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Short Description</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Language</th>
                                <th class="border-top-0">Level</th>
                                <th class="border-top-0">Visibility</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->short_description }}</td>
                                    <td>${{ $course->price }}</td>
                                    <td>{{ $course->language }}</td>
                                    <td>{{ $course->level }}</td>
                                    <td>{{ $course->visibility ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <!-- Botón de editar -->
                                        <a href="{{ url('/admin/courses/' . $course->id . '/edit') }}"
                                            class="btn btn-warning">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <!-- Botón de borrar -->
                                        <form action="{{ url('/admin/courses/' . $course->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
