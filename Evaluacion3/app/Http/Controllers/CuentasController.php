<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentaLoginRequest;
use App\Http\Requests\CuentaRegisterRequest;
use App\Http\Requests\EditarImagenRequest;
use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CuentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'logout', 'store']);
    }

    public function index() {
        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        $cuentas = Cuenta::all();
        return view('cuentas.index', compact('cuentas'));
    }

    public function edit($cuenta) {
        $cuenta = Cuenta::find($cuenta);
        if(Gate::allows('admin')) {
            $perfiles = Perfil::all();
            return view('cuentas.edit', compact(['cuenta', 'perfiles']));
        }
    }

    public function update(EditarImagenRequest $req, $cuenta) {
        $cuenta = Cuenta::find($cuenta);
        $cuenta->user = $cuenta->user;
        $cuenta->password = $cuenta->password;
        $cuenta->nombre = $req->nombre;
        $cuenta->apellido = $req->apellido;
        $cuenta->perfil_id = $req->perfil_id;
        $cuenta->save();
        return redirect()->route('cuenta.index');
    }

    public function show($cuenta) {
        $cuenta = Cuenta::find($cuenta);

        if ($cuenta->user == Auth::user()->user) {
            return view('cuentas.show', compact('cuenta'));
        }

        if(Gate::denies('admin')) {
            return redirect()->route('home.index');
        }

        return view('cuentas.show', compact('cuenta'));
    }

    public function login(CuentaLoginRequest $req) {
        $user = $req->username;
        $password = $req->password;

        if(Auth::attempt(['user' => $user, 'password' => $password])) {
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas'
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function store(CuentaRegisterRequest $req) {
        $cuenta = new Cuenta();
        $cuenta->user = $req->username;
        $cuenta->password = Hash::make($req->password);
        $cuenta->nombre = $req->nombre;
        $cuenta->apellido = $req->apellido;
        $cuenta->perfil_id = $req->perfil_id ?? 2;
        $cuenta->save();
        return redirect()->route('home.index');
    }

    public function destroy($cuenta) {
        $cuenta = Cuenta::find($cuenta);
        if(Gate::allows('admin')) {
            if($cuenta!=Auth::user() && $cuenta->perfil_id != Auth::user()->perfil_id) {
                $cuenta->delete();
            }
            return redirect()->route('cuenta.index');
        }
    }
}
