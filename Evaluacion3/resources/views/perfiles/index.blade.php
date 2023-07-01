@extends('templates.master')

@section('main-content')
    <div class="d-flex justify-content-center align-items-center mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Lista de Perfiles</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perfiles as $perfil)
                        <tr>
                            <th scope="row">{{$perfil->id}}</th>
                            <td>{{$perfil->nombre}}</td>
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
