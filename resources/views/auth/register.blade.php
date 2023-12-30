@extends('layouts.app')

@section('content')
    <div class="formulario section">
        <div class="form-container sign-up-form">
            <div class="imgBox sign-up-imgBox">
                <div class="link-form">
                    <p>Ya tienes una cuenta?</p>
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="sign-in-btn">Ingresa aquí</a>
                    @endif
                </div>
                <img src="{{ asset('img/baner-principal1.png') }}" alt="">
            </div>
            <div class="form-box sign-up-box">
                <h2>Registro</h2>
                <div class="login-options">
                    <div class="redes">
                        <a href=""><img src="{{ asset('img/facebook.png') }}" alt="facebook"></a>
                        <a href=""><img src="{{ asset('img/google.png') }}" alt="google"></a>
                        <a href=""><img src="{{ asset('img/apple.png') }}" alt="apple"></a>
                    </div>
                    <p class="text">O Regístrate con tu correo</p>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="input">
                        <i class="uil uil-at"></i>
                        <input type="email" name="email" placeholder="Ingrese su correo electrónico" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nombre Completo (aquí se puede dividir en nombre y apellido si es necesario) -->
                    <!-- Nombre -->
                    <div class="input">
                        <i class="uil uil-user"></i>
                        <input type="text" name="first_name" placeholder="Ingrese su nombre" required>
                        @error('first_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Apellido -->
                    <div class="input">
                        <i class="uil uil-user"></i>
                        <input type="text" name="last_name" placeholder="Ingrese su apellido" required>
                        @error('last_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Contraseña -->
                    <div class="input">
                        <i class="uil uil-lock-alt"></i>
                        <input type="password" name="password" placeholder="Ingrese su contraseña" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirmación de Contraseña -->
                    <div class="input">
                        <i class="uil uil-lock-access"></i>
                        <input type="password" name="password_confirmation" placeholder="Confirme su contraseña" required>
                    </div>

                    <input class="btn" type="submit" value="Regístrate">
                </form>
            </div>
        </div>
    </div>
@endsection
