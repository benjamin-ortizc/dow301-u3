<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PerfilesController extends Controller
{
    public function index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $perfiles = Perfil::all();
        return view('perfiles.index', compact('perfiles'));
    }
}
