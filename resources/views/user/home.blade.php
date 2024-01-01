@extends('layouts.app',  ['useViteAssets' => true] )

@section('content')
<x-vite-assets />
<div class="container margin-top-ex mb-5">
    <div class="row">
        <div class="col-md-8 my-5">

                <h1 class="h2">{{ __('Bienvenido de nuevo, ') . Auth::user()->first_name }} :) </h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link mx-3 active"
                            aria-current="page"
                            href="#"
                            >Mis cursos</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#"
                            >Mis favoritos</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#"
                            >Proximos eventos</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center">
        <div class="col mt-5">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col mt-5">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col mt-5">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
    <section class="bg-dark p-5 rounded mt-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 m-5">
                    <h5 class="fs-1 fw-bold mb-3 text-light">
                        Algun tipo de promocion aqui
                    </h5>
                    <p class="fs-4 text-light">
                        Cuanto tiempo falta o que se io
                        <span>24/7 </span>Support.
                    </p>
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="#"
                        role="button"
                        >go there</a
                    >
                </div>
            </div>
        </div>
    </section>
</div>
<x-footer />
@endsection
 