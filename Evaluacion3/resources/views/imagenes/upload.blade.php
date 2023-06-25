@extends('templates.master')

@section('main-content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h3>Subir Imagen</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('')}}" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="d-flex flex-column">
                            <label for="imagen">Ingrese la imagen</label>
                            <input id="imagen" type="file">
                            <button type="submit" class="btn btn-success">Subir Imagen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
