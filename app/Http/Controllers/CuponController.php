<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;
use App\Models\CuponUser;
use Cart;
use Illuminate\Support\Facades\Auth;

class CuponController extends Controller
{
    public function validarCupon(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required'
        ]);

        if (Auth::guest()) {
            return ['success' => false, 'msj' => 'Debes estar Logueado para validar el código!'];
        }

        $user_id = Auth::id();
        $cupon = Cupon::where('codigo', $request->codigo)->where('cantidad', '>', 0)->first();
        

        if ($cupon) {
            session(['idcupon' => $cupon->id, 'codigo_dscto' => $request->codigo]);
            $cuponUser = CuponUser::where('cupon_id', $cupon->id)->where('user_id', $user_id)->first();
            
            if (!$cuponUser) {
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'cupon',
                    'type' => 'tax',
                    'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                    'value' => '-'.$cupon->descuento.'%',
                    'attributes' => array( // attributes field is optional
                        'titulo' => $cupon->titulo,
                        'description' => $cupon->descripcion,
                        'codigo' => $cupon->codigo
                    )
                ));


                Cart::condition($condition);

                $cuponUser = new CuponUser;
                $cuponUser->cupon_id = $cupon->id;
                $cuponUser->user_id = $user_id;
                $cuponUser->precio_sin_dscto = Cart::getSubTotal();
                $cuponUser->precio_con_dscto = Cart::getTotal();
                $cuponUser->dscto = $cupon->descuento;
                $cuponUser->save();


                //cupon stock
                $cupon->cantidad = $cupon->cantidad - 1;
                $cupon->save();

                $success = true;
                $msj = 'Cupon válido';
            }else{
                $success = false;
                $msj = '<h6>Ya usaste este cupón.</h6>';
            } 
            
        }else{
            $success = false;
            $msj = '<h6>Ese código no tiene descuento.</h6>';
        }

        $total = Cart::getTotal();
        
        return ['success' => $success, 'msj' => $msj, 'total' => $total];
    }
}
