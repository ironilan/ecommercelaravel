<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use MercadoPago;  

class PaymentController extends Controller
{
  public function __construct()  
   {  
     // MercadoPago\SDK::setClientId(config('services.mercadopago.client_id'));  
     // MercadoPago\SDK::setClientSecret(config('services.mercadopago.client_secret'));   
     MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));  
   } 


  public function index(Request $request)
  {
    $pedido = [];
    $pedido = Pedido::find($request->pedido);
    if ($pedido) {
      $pedido = $pedido;
    }
    return view('cart.payment', compact('pedido'));
  }




  
   // no olvidar crear las rutas   
   public function success(Request $request){  

    if(isset($request->payment_id))
    {
      Cart::clear();
      Cart::clearCartConditions();
      
      $userId = Auth::id();
      $idpedido = session('pedido');
      $pedido = Pedido::where('user_id', $userId)->where('id', $idpedido)->first();
      if ($pedido) {
        $pedido->cargo = $request->payment_id;
        $pedido->origen = 'mercadopago';
        $pedido->fecha_pago = Carbon::now();
        $pedido->ano = Carbon::now()->format('Y');
        $pedido->mes = Carbon::now()->format('m');
        $pedido->dia = Carbon::now()->format('d');
        $pedido->estado = 'finalizado';
        $pedido->save();


        //actualizar stock
        foreach ($pedido->pedidodetalles as $key => $value) {
          $producto = Producto::find($value->producto_id);
          $producto->stock = $producto->stock - 1;
          $producto->save();
        }

        
        Session::forget('idenvio');
        Session::forget('pedido');
        Session::forget('idcupon');
        Session::forget('codigo_dscto');
      }

    }

     return redirect('/mi-cuenta/mis-compras');     
   }  
   public function failure(Request $request){  

     return redirect()->back();  
   }  
   public function pending(Request $request){  
     return 'pending';  
   }  
}
