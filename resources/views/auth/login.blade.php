@extends('layouts.app')

@section('content')
<div class="formulario section">
    <div class="form-container sign-in-form">
        <div class="form-box sign-in-box">
            <h2>Iniciar sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="input">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" placeholder="Ingrese su correo electrónico" required value="{{ old('email') }}">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-input" type="password" name="password" placeholder="Ingrese su contraseña" required>
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="link">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                    @endif
                </div>

                <input class="btn" type="submit" value="Ingresar">
            </form>
            <div class="login-options">
                <p class="text">O Inicia sesión con...</p>
                <div class="redes">
                    <a href=""><img   src="{{ asset('img/facebook.png') }}" alt="facebook"></a>
                    <a href=""><img  src="{{ asset('img/google.png') }}" alt="google"></a>
                    <a href=""><img   src="{{ asset('img/apple.png') }}" alt="apple"></a>
                </div>
            </div>
        </div>
        <!-- ... -->

        <div class="imgBox sign-in-imgBox">
            <div class="link-form">
                <p>No tienes una cuenta?</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="sign-up-btn">Regístrate aquí</a>
                @endif
            </div>
            <img src="{{ asset('img/principal.png') }}"   alt="">
        </div>
    </div>
</div>

@endsection
