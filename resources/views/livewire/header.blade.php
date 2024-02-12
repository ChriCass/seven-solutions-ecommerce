<div>
    <header class="header" id="header">
        <nav class="nav pading">
            <div class="nav__data">
                <a href="{{ url('/') }}" class="nav__logo  mx-4">
                    Logo
                </a>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Contenidos <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">


                                    <span class="dropdown__title">Cursos introductorios</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Bootcamp FullStack</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Introducción a CSS</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Introducción a Javascript</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Introducción a Git</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">

                                    <span class="dropdown__title">Cursos bootcampes</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador Flutter</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador Java</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador Web con React</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador Django</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">

                                    <span class="dropdown__title">Bootcamps</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador FullStack</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Desarrollador de APPS</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Diseñador UI/UX</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Hacking Ético</a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="dropdown__group">
                                    <span class="dropdown__title">Certificaciones</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Certificaciones de cursos</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Certifiacaiones de bootcamp</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Certificaciones gratuitas</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 2 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Recursos <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <span class="dropdown__title">Plantillas Web</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Plantillas gratis</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Plantillas premium</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <span class="dropdown__title">Diseños</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Diseños webs</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Diseños de apps</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Diseños de componentes</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <span class="dropdown__title">Otros</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Recent blogs</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Video tutoriales</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Webinar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#" class="nav__link">Precios</a>
                    </li>
                    <li class="nav__link">
                        <div class="search">
                            <input type="text" class="search_input" placeholder="Buscar curso" oninput="adjustWidth(this)">
                            <div class="search_boton">
                                <i class='ri-search-2-line search_icon'></i>
                            </div>
                        </div>
                        
                    </li>
                </ul>
            </div>
            <div class="nav__btns">
                @if (Route::has('login'))
                    @auth
                        <!-- Usuario Autenticado: Dropdown del Usuario -->
                        <div class="custom-dropdown">
                            <button class="custom-dropdown-btn"
                                id="customDropdownBtn">{{ Auth::user()->first_name }}</button>
                            <div class="custom-dropdown-content" id="customDropdownContent">
                                <a href="{{ url('/home') }}">Dashboard</a>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Usuario No Autenticado: Enlaces para iniciar sesión y registrarse -->
                        <a href="{{ route('login') }}" class="nav__link">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button__header">Regístrate</a>
                        @endif
                    @endauth
                @endif
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__toggle-menu"></i>
                <i class="ri-close-line nav__toggle-close"></i>
            </div>
        </nav>
    </header>
    
</div>
