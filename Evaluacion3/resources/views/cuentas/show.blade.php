@extends('templates.master')

@section('main-content')
    <div class="d-flex justify-content-center align-items-center mt-4 mb-4">
        <img src="https://webysoporte.es/components/com_jsn/assets/img/default.jpg"
             class="img-thumbnail rounded-circle"
             style="width: 150px;">

        <div class="mx-5 d-flex flex-column">
            <h5 class="text-start">{{$cuenta->user}}</h5>
            <p class="text-start">{{$cuenta->nombre . ' ' . $cuenta->apellido}}</p>
            <p><span class="fw-bold">{{count($cuenta->imagenes)}}</span> publicaciones</p>
        </div>
    </div>

    <hr>

    <div class="row mt-2">
        @foreach($cuenta->imagenes as $imagen)

            {{-- Modals --}}
            <div class="modal fade" id="modalBorrar{{$imagen->id}}" tabindex="-1" aria-labelledby="lblModalBorrar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="lblModalBorrar">Confirmar acción</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('imagen.destroy', $imagen->id )}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                Estás seguro que deseas eliminar tu imagen <span class="fw-bold">{{$imagen->titulo}}</span>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDesbanear{{$imagen->id}}" tabindex="-1" aria-labelledby="lblModalDesbanear" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="lblModalDesbanear">Confirmar acción</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('imagen.unbanImagen', $imagen )}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                Estás seguro que deseas desbanear la imagen?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Contenido principal --}}
            <div class="col-6">
                <div class="card mb-4" style="max-width: 470px;">
                    <img class="card-img-top" src="{{asset('./imagenes/' . $imagen->archivo)}}" style="
                        height: 400px; width: inherit; object-fit: cover;
                        @if($imagen->baneada)
                            filter: blur(10px);
                        @endif
                    ">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        @if($imagen->baneada)
                            <div class="d-flex flex-column">
                                <h4 class="text-decoration-line-through">{{$imagen->titulo}}<span class="mx-2 badge bg-danger">IMAGEN BANEADA</span></h4>
                                <p class="text-dark fw-bold my-0">Motivo del baneo: {{$imagen->motivo_ban}}</p>
                            </div>
                        @else
                            <h4>{{$imagen->titulo}}</h4>
                        @endif

                        @if($imagen->baneada)
                        @endif
                        <ul class="navbar-nav d-flex flex-row ms-auto me-1">
                            <li class="nav-item me-3 me-lg-0 dropdown">
                                <button class="border-0 bg-transparent material-icons text-decoration-none text-secondary" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">more_vert</button>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                    @if($cuenta->user === Auth::user()->user)
                                        <li>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalBorrar{{$imagen->id}}" class="dropdown-item d-flex justify-content-start align-items-center">
                                                <span class="mx-1 material-icons fs-5">delete</span> Borrar
                                            </button>
                                        </li>

                                        <li>
                                            <a href="{{route('imagen.edit', $imagen)}}" class="dropdown-item text-decoration-none text-dark d-flex justify-content-start align-items-center"><span class="mx-1 material-icons fs-5">edit</span> Editar</a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->perfil->nombre === 'Administrador')
                                        @if(!$imagen->baneada)
                                            <li>
                                                <a href="{{ route('imagen.ban', $imagen )}}"
                                                   class="dropdown-item text-decoration-none text-dark d-flex justify-content-start align-items-center">
                                                    <span class="mx-1 material-icons fs-5">not_interested</span>
                                                    Banear
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalDesbanear{{$imagen->id}}" class="dropdown-item d-flex justify-content-start align-items-center">
                                                    <span class="mx-1 material-icons fs-5">lock_open</span> Desbanear
                                                </button>
                                            </li>
                                        @endif
                                    @endif
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
