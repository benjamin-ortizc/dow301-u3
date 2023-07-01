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
        <h3>Editar Imagen</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{route('imagen.update', $imagen)}}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título de la imagen</label>
                        <input required type="text" class="form-control" id="titulo" name="nuevo_titulo" value="{{$imagen->titulo}}">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input required class="form-check-input" name="confirmar" type="checkbox" role="switch" id="edit_switch">
                        <label class="form-check-label" for="edit_switch">Estás seguro?</label>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
