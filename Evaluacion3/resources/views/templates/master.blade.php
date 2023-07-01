<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('style-ref')
    <title>Unidad 3</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home.index')}}">Instaflan</a>

            <div class="d-flex align-items-center">
                @if(!empty(Auth::user()->user))
                    <p class="m-0 p-0 mx-2">Conectado como {{Auth::user()->user}}</p>
                    @if(Auth::user()->perfil->nombre == 'Artista')
                        <a href="{{route('imagen.upload')}}" class="d-flex align-items-center text-decoration-none text-secondary flex-column mx-3">
                            <span class="material-icons text-success">add_box</span>
                            <small>Subir</small>
                        </a>
                    @endif
                    <ul class="navbar-nav d-flex flex-row ms-auto me-1">
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <img src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png" class="rounded-circle" height="22"
                                     alt="Foto de perfil" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                @if(Auth::user()->perfil->nombre === 'Artista')
                                    <li><a class="dropdown-item d-flex justify-content-start align-items-center" href="{{route('cuenta.show', Auth::user()->user)}}"><span class="mx-1 material-icons">person</span> Tu perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                @endif

                                @if(Auth::user()->perfil->nombre === 'Administrador')
                                        <li>
                                            <a class="dropdown-item d-flex justify-content-start align-items-center" href="{{route('home.admin')}}">
                                                <span class="mx-1 material-icons">admin_panel_settings</span> Panel de Administrador
                                            </a>
                                        </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item d-flex justify-content-start align-items-center" href="{{route('cuenta.logout')}}">Cerrar sesión</a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                @else
                    <a href="{{route('home.login')}}" class="d-flex align-items-center text-decoration-none text-dark">Iniciar sesión</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('main-content')
    </div>

    @yield('script-ref')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @yield('script-extras')
</body>
</html>
