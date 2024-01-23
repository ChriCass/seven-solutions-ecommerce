@extends('admin.layouts.top', ['useViteAssets' => true])

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="white-box">
                <h3 class="box-title">New Course Details</h3>
                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Mensaje de Advertencia -->
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <!-- Alerta de Errores de Validación -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <!-- Título, Precio, Idioma -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $course->title }}" placeholder="Course Title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $course->price }}" placeholder="Price" required>
                            </div>
                        </div>

                        <!-- Descripción Corta, Nivel, Categoría -->
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="2" required>{{ $course->short_description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" id="level" name="level"
                                    value="{{ $course->level }}" placeholder="Level" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="form-group mb-3">
                                <label for="outcomes">Outcomes</label>
                                <textarea class="form-control" id="outcomes" name="outcomes" rows="2" placeholder="Course Outcomes" required>{{ $course->outcomes }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_id">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $course->category_id) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- Thumbnail, Video URL, Visibilidad --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                {{-- Muestra la miniatura actual si existe --}}
                                @if ($course->thumbnail)
                                    <div class="d-flex mt-4 ">
                                        <img src="{{ asset(str_replace('public/', 'storage/', $course->thumbnail)) }}"
                                            alt="Current Thumbnail" style="max-width: 200px; ">
                                    </div>
                                @endif

                            </div>
                            <div class="form-group mb-3">
                                <label for="video">Video</label>
                                <input type="file" class="form-control" id="video" name="video">
                            
                                @if ($course->video_url)
                                    <div class="video-container mt-4">
                                        <video width="560" height="315" controls>
                                            <source src="{{ asset(str_replace('public/', 'storage/', $course->video_url)) }}" type="video/mp4">
                                            Tu navegador no soporta videos.
                                        </video>
                                    </div>
                                @endif
                            </div>
                            

                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="visibility">Visibility</label>
                                <select class="form-select" id="visibility" name="visibility">
                                    <option value="1" @if ($course->visibility == 1) selected @endif>Visible
                                    </option>
                                    <option value="0" @if ($course->visibility == 0) selected @endif>Hidden</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="language">Language</label>
                                <input type="text" class="form-control" id="language" name="language"
                                    value="{{ $course->language }}" placeholder="Language" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="section">Section</label>
                                <textarea class="form-control" id="section" name="section" rows="2" placeholder="Course Section" required>{{ $course->section }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="requirements">Requirements</label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="2"
                                    placeholder="Course Requirements" required>{{ $course->requirements }}</textarea>
                            </div>
                        </div>
                        {{-- Descripción Completa --}}
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="description">Full Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Full Description"
                                    required>{{ $course->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Botón de Envío --}}
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Update Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
