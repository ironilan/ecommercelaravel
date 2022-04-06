<?php

namespace App\Http\Controllers;

use App\Models\Listadeseo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function listWishlist()
    {
        $lista = Listadeseo::where('user_id', Auth::id())
                ->join('productos', 'productos.id', 'listadeseos.producto_id')
                ->select('productos.*')
                ->latest('listadeseos.id')
                ->get();

              
        return view('wishlist.lista', compact('lista'));
    }


    public function addWishlist(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $iduser = Auth::id();

        $lista = Listadeseo::where('producto_id', $request->id)->where('user_id', $iduser)->first();
        $msg = '';

        if (!$lista) {
            $wl = new Listadeseo;
            $wl->producto_id = $request->id;
            $wl->user_id = $iduser;
            $wl->save();

            $msg = '<h6>Se ha agregado a tu lista de deseos.</h6>';
        }else{
            $msg = '<h6>Ya tienes este producto en tu lista de deseos.</h6>';
        }

        return response()->json($msg, 200);
    }


    public function deleteWishlist(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $iduser = Auth::id();

        $lista = Listadeseo::where('producto_id', $request->id)->where('user_id', $iduser)->first();
        $msg = '';

        if ($lista) {
            $lista->delete();

            $msg = '<h6>Se ha eliminado de tu lista de deseos.</h6>';
        }else{
            $msg = '<h6>No existe el producto.</h6>';
        }

        return response()->json($msg, 200);


    }
}
