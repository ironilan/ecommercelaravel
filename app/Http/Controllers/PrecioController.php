<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    public function cambiarPrecio(Request $request)
    {
        $idprecio = $request->idprecio;
        $data = [];
        $precio = Precio::find($idprecio);
        if ($precio) {
            $data = $precio;
            session(['idprecio' => $precio->id]);
        }

        return response()->json($data, 200);
    }
}
