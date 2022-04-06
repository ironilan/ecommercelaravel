<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
//Route::get('categorias', [HomeController::class, 'categorias'])->name('categorias');
Route::get('categorias/{categoria}', [HomeController::class, 'productos'])->name('categorias.show');

Route::get('productos', [HomeController::class, 'productos'])->name('productos');
Route::get('productos/{producto}', [HomeController::class, 'producto'])->name('productos.show');

Route::get('promociones', [HomeController::class, 'promociones'])->name('promociones');

Route::get('promociones/{promocion}', [HomeController::class, 'promocion'])->name('promociones.show');

Route::get('nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('galeria', [HomeController::class, 'galeria'])->name('galeria');
Route::get('marcas', [HomeController::class, 'marcas'])->name('marcas');



Route::get('terminos', [HomeController::class, 'terminos'])->name('terminos');
Route::get('politicas', [HomeController::class, 'politicas'])->name('politicas');


Route::get('/carrito', [CartController::class, 'carrito'])->name('carrito');





Route::get('verProducto', [HomeController::class, 'verProducto'])->name('verProducto');
Route::get('addCart', [CartController::class, 'addCart'])->name('cart.add');
Route::get('updateCart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('deleteCart', [CartController::class, 'deleteCart'])->name('cart.delete');


Route::get('cambiarPrecio', [PrecioController::class, 'cambiarPrecio'])->name('precio.cambiar');



Route::post('actualizarDatos', [UsuarioController::class, 'actualizarDatos'])->name('cart.actualizarDatos');
Route::post('actualizarPassword', [UsuarioController::class, 'actualizarPassword'])->name('cart.actualizarPassword');


Route::group(
    [
    
    'middleware' => 'auth'
], function () {

    Route::group(
    [
        'prefix' => 'mi-cuenta/wishlist'
    ], function () {

        Route::get('/agregar', [WishlistController::class, 'addWishlist'])->name('wishlist.agregar');
        Route::get('/lista', [WishlistController::class, 'listWishlist'])->name('wishlist.lista');
        Route::get('/limpiar', [WishlistController::class, 'clearWishlist'])->name('wishlist.limpiar');
        Route::get('/eliminar', [WishlistController::class, 'deleteWishlist'])->name('wishlist.eliminar');

    });


    Route::get('/mi-cuenta/mis-compras', [ComprasController::class, 'misCompras'])->name('miCuenta.misCompras');
    Route::get('/mi-cuenta/mis-compras/{pedido}', [ComprasController::class, 'factura'])->name('miCuenta.misCompras.pedido');

    Route::get('/mi-cuenta/mis-datos', [UsuarioController::class, 'misDatos'])->name('miCuenta.misDatos');
    
    
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    

    Route::get('/datosenvios', [EnvioController::class, 'datosenvios'])->name('datosenvios.store');

    Route::post('valida-cupon', [CuponController::class, 'validarCupon'])->name('cart.validarCupon');
    Route::post('realizarPedido', [PedidoController::class, 'realizarPedido'])->name('pedido.realizarPedido');


    Route::get('/mi-cuenta', [UsuarioController::class, 'miCuenta']);
    //Route::post('/', [UsuarioController::class, 'updateDatos']);


   

    //redireccionamos despues del pago
    Route::get('/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/failure', [PaymentController::class, 'failure'])->name('payment.failure');

    Route::get('logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('user.logout');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


