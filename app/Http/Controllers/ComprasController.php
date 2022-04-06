<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function misCompras()
    {
        $userId = Auth::id();
        $pedidos = Pedido::where('user_id', $userId)->latest('id')->get();
        return view('compras.lista', compact('pedidos'));
    }

    public function factura(Pedido $pedido)
    {
        $userId = Auth::id();
        $pedido = Pedido::where('user_id', $userId)->whereId($pedido->id)->first();
        if ($pedido) {
            return view('compras.factura', compact('pedido'));
        }

        return redirect('/mi-cuenta/mis-compras');
        
    }
}
