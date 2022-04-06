<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Galeria;
use App\Models\Inicio;
use App\Models\Legal;
use App\Models\Marca;
use App\Models\Nosotro;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Subcategoria;
use App\Models\Testimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $productosNuevos = Producto::whereNuevo('si')->latest('id')->take(4)->get();

        $bannersPrincipal = Banner::whereTipo('principal')->latest('id')->get();
        $bannersVertical = Banner::whereTipo('vertical')->latest('id')->take(2)->get();

        $marcas = Marca::where('ocultar', 'no')->latest('id')->get();
        $inicio = Inicio::find(1);


        //mas vendidos
        $masVendidos = DB::select('SELECT pedidodetalles.producto_id, SUM(pedidodetalles.cantidad) AS TotalVentas FROM pedidodetalles GROUP BY pedidodetalles.producto_id ORDER BY SUM(pedidodetalles.cantidad) DESC LIMIT 0 , 30');
        $arrayProdVenta = [];

        foreach ($masVendidos as $key => $mv) {
            $prodV = Producto::find($mv->producto_id);
            $venta = $prodV;

            array_push($arrayProdVenta, $venta);
        }

        //return response()->json($arrayProdVenta);

        //********************************************

        $pagina = 'inicio';

        return view('index', compact('categorias', 'productosNuevos', 'bannersVertical', 'bannersPrincipal', 'marcas', 'pagina', 'arrayProdVenta', 'inicio'));
    }


    public function productos(Request $request)
    {

        if($request->categoria != null)
        {
            //categoria
            $categoria = Categoria::whereSlug($request->categoria)->first();
            $subcategoria = Subcategoria::whereSlug($request->subcategoria)->first();
            $marca = Marca::whereSlug($request->marca)->first();
            $precio = $request->precio;
            $criterio = $request->criterio;


            $subcategorias = Subcategoria::where('categoria_id',$categoria->id)->get();
            $marcas = Marca::where('categoria_id',$categoria->id)->get();
            

            if ($subcategoria) {
                $subcategoria = $subcategoria->id;
            }else{
                $subcategoria = '';
            }

            if ($marca) {
                $marca = $marca->id;
            }else{
                $marca = '';
            }


            $productos = Producto::where(function ($query) use ($categoria) {
                            $query->categoria($categoria->id);
                        })->where(function ($query) use ($subcategoria) {
                            $query->subcategoria($subcategoria);
                        })->where(function ($query) use ($marca) {
                            $query->marca($marca);
                        })->where(function ($query) use ($precio) {
                            $query->precio($precio);
                        })->where(function ($query) use ($criterio) {
                            $query->criterio($criterio);
                        })->paginate(8);
        }else{
            $subcategorias = Subcategoria::orderBy('titulo', 'asc')->get();
            $marcas = Marca::orderBy('titulo', 'asc')->get();
            
            $criterio = $request->criterio;

            $productos = Producto::where(function ($query) use ($criterio) {
                            $query->criterio($criterio);
                        })->paginate(8);
        }


        
         //mas vendidos
        $masVendidos = DB::select('SELECT pedidodetalles.producto_id, SUM(pedidodetalles.cantidad) AS TotalVentas FROM pedidodetalles GROUP BY pedidodetalles.producto_id ORDER BY SUM(pedidodetalles.cantidad) DESC LIMIT 0 , 30');
        $productosMasVendidos = [];

        foreach ($masVendidos as $key => $mv) {
            $prodV = Producto::find($mv->producto_id);
            $venta = $prodV;

            array_push($productosMasVendidos, $venta);
        }

        //return response()->json($productosMasVendidos);

        //********************************************

       

        return view('productos', compact('productos', 'subcategorias', 'marcas', 'productosMasVendidos'));
    }



    public function verProducto(Request $request)
    {
        $prod = Producto::find($request->id);
       // return $prod->estrellas;
        $estrellas = '';
        for ($i=0; $i < $prod->estrellas; $i++) { 
            $estrellas.= '<i class="bx bxs-star"></i>';
        }

        $producto = [
            'id' => $prod->id,
            'titulo' => $prod->titulo,
            'precio_antes' => 'S/. '.$prod->precio_antes,
            'precio_actual' => 'S/. '.$prod->precio_actual,
            'estrellas' => $estrellas,
            'resumen' => $prod->resumen,
            'imagen' => $prod->imagen ? Storage::url($prod->imagen) : null,
            'sku' => '<span>SKU:</span> '.$prod->sku,
            'link' => '/productos/'.$prod->slug,
            'categoria' => $prod->categoria ? '<span>Categoría:</span> <a href="/productos?categoria='.$prod->categoria->slug.'">'.$prod->categoria->titulo.'</a>' : null,
            'disponibilidad' => $prod->stock > 0 ? '<span>Disponibilidad:</span> En stock ('.$prod->stock.' items)' : '<span>Disponibilidad:</span> Sin stock',
        ];

        return response()->json($producto, 200);
    }

    // public function categorias()
    // {
    //     return view('categorias', compact('categoria'));
    // }

    // public function categoria(Categoria $categoria)
    // {
    //     return view('categoria', compact('categoria'));
    // }

    public function nosotros()
    {
        $pagina = 'nosotros';
        $nosotros = Nosotro::find(1);
        $marcas = Marca::latest('id')->get();
        $equipos = Equipo::latest('id')->get();
        $testimonios = Testimonio::latest('id')->get();
        return view('nosotros', compact('pagina', 'nosotros', 'marcas', 'equipos', 'testimonios'));
    }

    public function galeria()
    {
        $pagina = 'galeria';
        $galeria = Galeria::latest('id')->get();
        return view('galeria', compact('pagina', 'galeria'));
    }

    public function marcas()
    {
        $marcas = Marca::where('ocultar', 'no')->latest('id')->get();
        $pagina = 'marcas';

        return view('marcas', compact('marcas', 'pagina'));
    }

    public function promociones(Request $request)
    {
        $promociones = Promocion::whereTipo('promo')->get();
        $pagina = 'promociones';

        return view('promociones', compact('promociones', 'promociones'));
    }


    public function promocion(Promocion $promocion)
    {
        return view('promocion', compact('promocion'));
    }


    


    public function producto(Producto $producto)
    {
       // $producto = Promocion::whereTipo('promo')->get();
        $pagina = 'productos';
        return view('producto', compact('producto'));
    }

    public function politicas()
    {
        $legal = Legal::find(1);
        $pagina = 'politicas';
        return view('politicas', compact('legal'));
    }

    public function terminos()
    {
        $legal = Legal::find(1);
        $pagina = 'terminos';
        return view('terminos', compact('legal'));
    }
}
