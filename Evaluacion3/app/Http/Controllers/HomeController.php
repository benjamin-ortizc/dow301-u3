<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Imagen;
use App\Models\Perfil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($imgFiltradas = null) {
        $imagenes = Imagen::all();
        $artistas = Cuenta::all()->where('perfil_id', 2);
        return view('home.index', compact(['imagenes', 'artistas', 'imgFiltradas']));
    }

    public function filtrar(Request $request) {
        $imagenesFiltradas = Imagen::where('cuenta_user', $request->listaArtistas)->get();
        return $this->index($imagenesFiltradas);
    }

    public function login() {
        return view('home.login');
    }

    public function register() {
        $perfiles = Perfil::all();
        return view('home.register', compact('perfiles'));
    }

    public function admin() {
        if(Gate::denies('admin')){
            return redirect()->route('home.index');
        }

        return view('home.admin');
    }
}
