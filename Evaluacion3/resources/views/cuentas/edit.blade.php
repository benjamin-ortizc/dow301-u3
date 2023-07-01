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
        <h3>Editar Cuenta</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('cuenta.update', $cuenta->user) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input required type="text" class="form-control" id="nombre" name="nombre" value="{{$cuenta->nombre}}">
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input required type="text" class="form-control" id="apellido" name="apellido" value="{{$cuenta->apellido}}">
                    </div>

                    <div class="mb-2">
                        <label for="perfiles">Seleccione perfiles de usuario</label>
                        <select id="perfiles" name="perfil_id" class="form-select mb-2">
                            @foreach($perfiles as $perfil)
                                <option value="{{$perfil->id}}" @if($perfil->nombre === 'Artista') selected @endif>{{$perfil->nombre}}</option>
                            @endforeach
                        </select>
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
