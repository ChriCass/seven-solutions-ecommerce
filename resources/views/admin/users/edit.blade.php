@extends('admin.layouts.top', ['useViteAssets' => true])

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12">
        <div class="white-box">
            <h3 class="box-title">Detalles del Usuario</h3>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif

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
                    <!-- Nombre, Apellido, Correo Electrónico -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="first_name">Nombre</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="Nombre" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Apellido" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Correo Electrónico" required>
                        </div>
                    </div>

                    <!-- Contraseña, Rol, Foto -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="password">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                <div class="input-group-append mx-3">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()"><i id="password-icon" class="bi bi-eye"></i></button>
                                </div>
                            </div>
                            <small class="text-muted">Dejar en blanco para mantener la contraseña actual.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Rol</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">Selecciona un Rol</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="photo">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            @if ($user->photo)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Actual" style="max-width: 100px;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var passwordIcon = document.getElementById('password-icon');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        }
    }
    </script>
@endsection
