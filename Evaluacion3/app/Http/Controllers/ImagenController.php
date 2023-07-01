<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanImagenRequest;
use App\Http\Requests\EditarImagenRequest;
use App\Http\Requests\UploadImagenRequest;
use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload() {
        return view('imagenes.upload');
    }

    public function store(UploadImagenRequest $req) {
        $imagen = new Imagen();

        $file = $req->file('imagen');

        $fileName = $file->getClientOriginalName();
        Storage::putFileAs(
            'imagenes',
            $file,
            $fileName
        );
        Storage::setVisibility($fileName, 'public');

        $imagen->titulo = $req->titulo;
        $imagen->archivo = $fileName;
        $imagen->cuenta_user = Auth::user()->user;
        $imagen->baneada = false;
        $imagen->save();

        return redirect()->route('home.index');
    }

    public function destroy(Request $request, Imagen $imagen)
    {
        $imagen->delete();
        Storage::delete('./imagenes/' . $imagen->archivo);
        return redirect()->route('cuenta.show', $imagen->cuenta->user);
    }

    public function edit(Imagen $imagen)
    {
        return view('imagenes.edit', compact('imagen'));
    }

    public function update(EditarImagenRequest $request, Imagen $imagen)
    {
        $imagen->titulo = $request->nuevo_titulo;
        $imagen->save();
        return redirect()->route('cuenta.show', Auth::user()->user);
    }

    public function ban(Imagen $imagen) {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        return view('imagenes.ban', compact('imagen'));
    }

    public function banImagen(BanImagenRequest $request, Imagen $imagen) {
        $imagen->baneada = true;
        $imagen->motivo_ban = $request->motivo_ban;
        $imagen->save();
        return redirect()->route('cuenta.show', $imagen->cuenta->user);
    }

    public function unbanImagen(Request $request, Imagen $imagen) {
        $imagen->baneada = false;
        $imagen->motivo_ban = null;
        $imagen->save();
        return redirect()->route('cuenta.show', $imagen->cuenta->user);
    }
}
