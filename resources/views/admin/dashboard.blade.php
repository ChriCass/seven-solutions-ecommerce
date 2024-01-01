@extends('layouts.app',  ['useViteAssets' => true] )

@section('content')
<x-vite-assets />
<div class="container margin-top-ex">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! admin!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
