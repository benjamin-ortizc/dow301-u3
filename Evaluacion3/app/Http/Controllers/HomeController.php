<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $imagenes = Imagen::all();
        return view('home.index', compact('imagenes'));
    }
}
