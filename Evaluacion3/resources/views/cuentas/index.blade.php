@extends('templates.master')

@section('main-content')
    <div class="d-flex justify-content-center align-items-center mt-4 flex-column">
        <a href="{{route('home.register')}}" class="
                                text-decoration-none text-dark d-flex
                                justify-content-start align-items-center btn mb-3
                            ">
            <span class="mx-1 material-icons fs-5 text-success mx-2">add_circle</span>
            <p class="fw-bold m-0 p-0">Agregar usuario</p>
        </a>
        <div class="card">
            <div class="card-header">
                <h3>Lista de Perfiles</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cuentas as $cuenta)

                        <div class="modal fade" id="borrar_{{$cuenta->user}}" tabindex="-1" aria-labelledby="borrarCuentaLbl" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="borrarCuentaLbl">Confirmar acción</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('cuenta.destroy', $cuenta )}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-body">
                                            Estás seguro que deseas eliminar la cuenta <span class="fw-bold">{{$cuenta->user}}</span>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Confirmar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <tr>
                            <th scope="row">{{$cuenta->user}}</th>
                            <td>{{$cuenta->nombre}}</td>
                            <td>{{$cuenta->apellido}}</td>
                            <td>{{$cuenta->perfil->nombre}}</td>
                            <td class="d-flex align-items-center justify-content-start">
                                <a href="{{route('cuenta.show', $cuenta->user)}}" class="
                                    text-decoration-none text-dark d-flex
                                    justify-content-start align-items-center
                                ">
                                    <span class="btn btn-primary mx-1 material-icons px-1 py-1">visibility</span>
                                </a>

                                <button type="button" data-bs-toggle="modal" data-bs-target="#borrar_{{$cuenta->user}}" class="mx-1 border-0 bg-transparent">
                                    <span class="btn btn-danger material-icons px-1 py-1">delete</span>
                                </button>

                                <a href="{{route('cuenta.edit', $cuenta)}}" class="
                                    text-decoration-none text-dark d-flex
                                    justify-content-start align-items-center
                                ">
                                    <span class="btn btn-warning mx-1 material-icons px-1 py-1">edit</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="{{route('home.admin')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
@endsection
