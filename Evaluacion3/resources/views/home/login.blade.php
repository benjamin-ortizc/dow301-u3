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
    <title>Inicio de sesión</title>
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
        <h3>Inicio de sesión</h3>
        <div class="card" style="width: 280px;">
            <div class="card-body" >
                <form method="POST" action="{{route('cuenta.login')}}" class="form">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Nombre de usuario</label>
                        <input type="text" name="username" id="inputUsername" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="inputPassword" class="form-control">
                    </div>

                    <div class="d-flex mb-3 justify-content-center align-items-center">
                        <a href="{{route('home.register')}}" class="btn btn-link">Registrarse</a>
                    </div>
                    <div class="mb-3 text-center d-flex justify-content-center">
                        <button type="submit" class="btn btn-success d-flex align-items-center justify-content-center">Ingresar <span class="mx-1 material-icons">login</span></button>
                    </div>
                </form>

        </div>
    </div>
</body>
</html>
