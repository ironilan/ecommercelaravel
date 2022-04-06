<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Distrito;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function miCuenta()
    {
        
        return view('auth.miCuenta');
    }


    public function misDatos()
    {
        

        $distritos = Cache::remember('distritos', 120, function () { 
            return Distrito::orderBy('nombre', 'asc')->get();
        });

        $departamentos = Cache::remember('departamentos', 120, function () { 
            return Departamento::orderBy('nombre', 'asc')->get();
        });

        return view('auth.misDatos', compact('distritos', 'departamentos'));
    }


    public function actualizarDatos(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'cellphone' => 'required',
            'cumple' => 'required',
            'direccion' => 'required',
            'distrito' => 'required',
            'departamento' => 'required',
        ]);

        $datos = Auth::user();
        $datos->name = $request->name;
        $datos->email = $request->email;
        $datos->dni = $request->dni;
        $datos->cellphone = $request->cellphone;
        $datos->cumple = $request->cumple;
        $datos->direccion = $request->direccion;
        $datos->distrito = $request->distrito;
        $datos->departamento = $request->departamento;
        $datos->save();

        return response()->json($datos, 200);
    }


     public function actualizarPassword(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $datos = Auth::user();
        $datos->password = bcrypt($request->password);        
        $datos->save();

        return response()->json($datos, 200);
    }
}
