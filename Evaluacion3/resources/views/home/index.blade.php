@extends('templates.master')

@section('main-content')
    <div class="d-flex justify-content-start mt-3">
        <form action="{{route('home.filtrar')}}" method="POST">
            @method('POST')
            @csrf
            <h5>Filtrar por artistas</h5>
            <select name="listaArtistas" id="artistas" class="form-select mb-2">
                <option value="none" selected>Seleciona una artista</option>
                @foreach($artistas as $artista)
                    <option value="{{$artista->user}}">{{$artista->user}} ({{$artista->nombre . ' ' . $artista->apellido}})</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{route('home.index')}}" class="mx-2 btn btn-danger">Borrar filtro</a>
        </form>
    </div>


    <div class="row mt-4">
        @if(!empty($imgFiltradas))
            @if(count($imgFiltradas) > 0)
                @foreach($imgFiltradas as $imagen)
                    @if(!$imagen->baneada)
                        <div class="col-6">
                            <div class="card mb-4" style="max-width: 470px;">
                                <img class="card-img-top" src="{{asset('./imagenes/' . $imagen->archivo)}}" style="height: 400px; width: inherit; object-fit: cover;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h4>{{$imagen->titulo}}</h4>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <figure class="d-flex justify-content-end align-items-center">
                                                <img src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png"
                                                     class="rounded-circle mx-2"
                                                     height="22"
                                                     alt="Foto de perfil" loading="lazy" />
                                                <figcaption class="d-flex flex-column">
                                                    <a href="{{route('cuenta.show', $imagen->cuenta->user)}}" class="text-decoration-none fw-bolder">
                                                        {{$imagen->cuenta->user}}
                                                    </a>
                                                    <small>{{$imagen->cuenta->nombre . ' ' . $imagen->cuenta->apellido}}</small>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        No se encontraron resultados
                    </div>
                </div>
            @endif
        @else
            @foreach($imagenes as $imagen)
                @if(!$imagen->baneada)
                    <div class="col-6">
                        <div class="card mb-4" style="max-width: 470px;">
                            <img class="card-img-top" src="{{asset('./imagenes/' . $imagen->archivo)}}" style="height: 400px; width: inherit; object-fit: cover;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h4>{{$imagen->titulo}}</h4>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end align-items-center">
                                        <figure class="d-flex justify-content-end align-items-center">
                                            <img src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png"
                                                 class="rounded-circle mx-2"
                                                 height="22"
                                                 alt="Foto de perfil" loading="lazy" />
                                            <figcaption class="d-flex flex-column">
                                                <a href="{{route('cuenta.show', $imagen->cuenta->user)}}" class="text-decoration-none fw-bolder">
                                                    {{$imagen->cuenta->user}}
                                                </a>
                                                <small>{{$imagen->cuenta->nombre . ' ' . $imagen->cuenta->apellido}}</small>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
