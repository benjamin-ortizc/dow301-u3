@extends('templates.master')

@section('main-content')
    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 80vh;">
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
        <div class="card">
            <div class="card-header text-center">
                <h3>Crear publicación</h3>
            </div>

            <div class="card-body d-flex flex-column">
                <form method="POST" action="{{route('imagen.store')}}" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label class="form-label" for="titulo">Titulo de la imagen</label>
                        <input class="form-control" name="titulo" id="titulo" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="imagen">Imagen que desea subir</label>
                        <input class="form-control" accept="image/*" name="imagen" id="imagen" type="file">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
