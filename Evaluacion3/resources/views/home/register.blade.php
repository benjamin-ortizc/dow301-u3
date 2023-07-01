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

    <title>Registro de usuario</title>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center flex-column" style="height: 100vh">
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>Por favor solucione los siguientes problemas:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3>Registro de usuario</h3>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('cuenta.store')}}" class="form">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="inputNombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="inputNombre" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="inputApellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" id="inputApellido" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputUsername" class="form-label">Nombre de usuario</label>
                        <input type="text" name="username" id="inputUsername" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="inputPassword2" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="inputPassword2" class="form-label">Repita contraseña</label>
                        <input type="password" name="password2" id="inputPassword2" class="form-control">
                    </div>

                    @if(Auth::user()->perfil->nombre === 'Administrador')
                        <div class="mb-2">
                            <label for="perfiles">Seleccione perfiles de usuario</label>
                            <select id="perfiles" name="perfil_id" class="form-select mb-2">
                                @foreach($perfiles as $perfil)
                                    <option value="{{$perfil->id}}" @if($perfil->nombre === 'Artista') selected @endif>{{$perfil->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="mt-4 text-center d-flex justify-content-center">
                        <button type="submit" class="btn btn-success d-flex align-items-center justify-content-center">Registrarte</button>
                    </div>
                </form>

        </div>
    </div>
</body>
</html>
