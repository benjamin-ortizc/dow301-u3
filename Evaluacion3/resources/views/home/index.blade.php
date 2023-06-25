@extends('templates.master')

@section('main-content')
    @foreach($imagenes as $imagen)
        <div>Imagen {{$imagen->titulo}}</div>
    @endforeach
@endsection
