<?php

namespace App\Http\Controllers;

use App\Models\Datosenvio;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Envio;
use App\Models\Pedido;
use App\Models\Peso;
use App\Models\Precio;
use App\Models\Producto;
use Cache;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function carrito()
    {
        //borramos el envio y descuento cada q entres al carrito
        Cart::clearCartConditions();
        return view('cart.carrito');
    }


    public function checkout(Request $request)
    {
        $datos = [];
        $datosEnvioLLenos = null;
        $pedido = [];

        Session::forget('idenvio');

        if(count(Cart::getContent()) < 1)
        {
            return redirect('/productos');
        }

        //Cart::clearCartConditions();
        
        
        if ($request->pedido and !Auth::guest()) {
            $detalle = Datosenvio::where('pedido_id', $request->pedido)->where('user_id', Auth::id())->first();
            $pedido = Pedido::find($request->pedido);
            if ($detalle) {
                $datos = $detalle;
                $datosEnvioLLenos = true;
                
            } else{
                $datos = [];
            }           

        }
        $distritos = Cache::remember('distritos', 120, function () { 
            return Distrito::orderBy('nombre', 'asc')->get();
        });

        $departamentos = Cache::remember('departamentos', 120, function () { 
            return Departamento::orderBy('nombre', 'asc')->get();
        });

        $envios = Cache::remember('envios', 120, function () { 
            return Envio::orderBy('id', 'desc')->get();
        });

       //dd($datos);

        return view('cart.checkout', compact('distritos', 'departamentos', 'datos', 'envios', 'datosEnvioLLenos', 'pedido'));
    }


    public function addCart(Request $request)
    {
        //Cart::destroy();
        if(!$request->ajax()){
            return 'No tienes permisos para hacer esta acción.';
        };

        $this->validate($request, [
            'id' => 'required',
            'cantidad' => 'required',
        ]);
        $producto = Producto::whereId($request->id)->where('stock', '>=', $request->cantidad)->first();
        
        if ($producto) {
            if ($producto->tipo == 'producto') {
                if ($producto->precios) {
                    $idprecio = session('idprecio');
                    $precio = Precio::find($idprecio);

                    Cart::add(
                        $producto->id.time(), 
                        $producto->titulo.' - '.$precio->titulo,
                        $precio->precio, 
                        $request->cantidad, 
                        array(
                            'id'        => $producto->id,
                            'tipo'        => 'producto',
                            'imagen'    => Storage::url($producto->imagen), 
                            'precio_id' => $precio->id,
                            'slug'      => $producto->slug
                        )
                    );                
                }
            }else{
                Cart::add(
                    $producto->id.time(), 
                    $producto->titulo,
                    $producto->precio_actual, 
                    $request->cantidad, 
                    array(
                        'id'        => $producto->id,
                        'tipo'        => 'promo',
                        'imagen'    => Storage::url($producto->imagen), 
                        //'precio_id' => $precio->id,
                        'slug'      => $producto->slug
                    )
                ); 
            }     
        }else{
            $producto = [
                'msj' => 'no hay stock suficiente',
            ];
        }

        return response()->json(['producto' => $producto, 'cantidad' => count(Cart::getContent())] ,200);
    }


    public function updateCart(Request $request)
    {
        //Cart::destroy();
        if(!$request->ajax()){
            return 'No tienes permisos para hacer esta acción.';
        };

        

        $this->validate($request,[
            'cant' => 'required',
            'idprod' => 'required',
        ]);

        $cart = Cart::update($request->idprod, array(
          'quantity' => array(
              'relative' => false,
              'value' => $request->cant
          ),
        ));

        return response()->json($cart ,200);
    }


    public function deleteCart(Request $request)
    {
        //Cart::destroy();
        if(!$request->ajax()){
            return 'No tienes permisos para hacer esta acción.';
        };

        $this->validate($request, [
            'idprod' => 'required',
        ]);

        $cart = Cart::remove($request->idprod);

        return response()->json($cart ,200);
    }


    public function validarCupon(Request $request)
    {

    }
}
