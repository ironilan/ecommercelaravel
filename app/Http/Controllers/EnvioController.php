<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Cart;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function datosenvios(Request $request)
    {
        $idenvio = $request->id;
        $envio = Envio::find($idenvio);
        $data = [];
        if ($envio) {
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'envio',
                'type' => 'tax',
                'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => '+'.$envio->precio,
                'attributes' => array( // attributes field is optional
                    'description' => $envio->titulo,
                    'codigo' => $envio->id
                )
            ));

            Cart::condition($condition);
            session(['idenvio' => $idenvio]);

            $data = [
                'precio' => 'S/. '.formatoNumero($envio->precio),
                'subtotal' => 'S/. '.formatoNumero(Cart::getSubTotal()),
                'total' => 'S/. '.formatoNumero(Cart::getTotal()),
                'idenvio' => $idenvio
            ];
        }


        return response()->json($data, 200);
    }
}
