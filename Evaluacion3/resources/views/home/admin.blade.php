@extends('templates.master')

@section('main-content')
    <section class="d-flex justify-content-center align-items-center flex-column" style="height: 80vh;">
        <h5>Panel de Administrador</h5>

        <a href="{{route('cuenta.index')}}" class="btn btn-primary mb-2">Gestionar Cuentas</a>
        <a href="{{route('perfiles.index')}}" class="btn btn-primary">Ver perfiles del Sistema</a>
    </section>
@endsection
