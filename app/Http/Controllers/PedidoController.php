<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Datosenvio;
use App\Models\Pedido;
use App\Models\Pedidodetalle;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{
    public function realizarPedido(Request $request)
    {
        if (Session::has('idenvio')) {
            if (session('idenvio') != 1) {
                $this->validate($request, [
                    'nombre' => 'required', 
                    'apellido' => 'required', 
                    'telefono' => 'required', 
                    'email' => 'required', 
                    'departamento' => 'required', 
                    'distrito' => 'required', 
                    'direccion' => 'required', 
                    'referencia' => 'required'
                ]);
            }else{
                $this->validate($request, [
                    'nombre' => 'required', 
                    'apellido' => 'required', 
                    'telefono' => 'required', 
                    'email' => 'required'
                    
                ]);
            }
        }
        
        //return $request->all();


        $userId = Auth::id();
        $idcupon = session('idcupon');
        $idenvio = session('idenvio');
        
        $cupon = Cupon::find($idcupon);
        $carrito = Cart::getContent();

        DB::beginTransaction();

        try {
            //creamos el pedido
            $pedido = new Pedido;
            $pedido->user_id = $userId;
            $pedido->envio_id = $idenvio;
            $pedido->moneda = 'PEN';
            $pedido->cod_cupon = $cupon ? $cupon->codigo : '';
            $pedido->dscto_cupon = $cupon ? $cupon->descuento : 0;
            $pedido->monto_original = Cart::getSubTotal();
            $pedido->monto_final = Cart::getTotal();
            $pedido->cod_dsct = $cupon ? 'si' : 'no';
            $pedido->estado = 'pendiente';
            $pedido->save();

            foreach ($carrito as $key => $cart) {
                $detalle = new Pedidodetalle;
                $detalle->producto_id = $cart->attributes['id'];
                
                if ($cart->attributes['tipo'] == 'producto') {
                    $detalle->precio_id = $cart->attributes['precio_id'];
                }

                $detalle->precio = $cart->price;
                $detalle->cantidad = $cart->quantity;
                $detalle->pedido_id = $pedido->id;
                $detalle->save();
            }

            //creamos los datos de envio
            $datos = new Datosenvio;            
            $datos->user_id = $userId;
            $datos->pedido_id = $pedido->id;
            $datos->nombre = $request->nombre;
            $datos->apellido = $request->apellido;
            $datos->telefono = $request->telefono;
            $datos->email = $request->email;
            $datos->departamento = $request->departamento;
            $datos->distrito = $request->distrito;
            $datos->direccion = $request->direccion;
            $datos->referencia = $request->referencia;
            $datos->save();


            //creamos varible de session del pedido para q no pueda pedir nuevamente
            session(['pedido' => $pedido->id]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();

            return $e;
            // something went wrong
        }

        


        return response()->json($pedido, 200);

    }
}
