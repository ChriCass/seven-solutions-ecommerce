<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <!-- Scripts -->

    @isset($useViteAssets)
        <x-vite-assets />
    @endisset
    <style>
 
    </style>
 
</head>

<body>
    <div id="app">
        @livewire('header')

        <main class="m-extreme">
            @yield('content')
        </main>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownBtn = document.getElementById('customDropdownBtn');
            var dropdownContent = document.getElementById('customDropdownContent');

            dropdownBtn.onclick = function() {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            };

            // Cerrar el dropdown si se hace clic fuera de él
            window.onclick = function(event) {
                if (!event.target.matches('.custom-dropdown-btn')) {
                    if (dropdownContent.style.display === 'block') {
                        dropdownContent.style.display = 'none';
                    }
                }
            };
        });
    </script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
