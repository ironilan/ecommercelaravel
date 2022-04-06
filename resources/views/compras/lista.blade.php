@extends('layouts.principal')
@section('contenido')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Mis compras</h1>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>Mis compras</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Wishlist Area -->
<div class="wishlist-area ptb-100">
    <div class="container">
        <form>
            <div class="wishlist-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha de compra</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        
                        <tr>
                            <td>
                                <a href="{{ route('productos.show', 1) }}">
                                    @if ($pedido->pedidodetalles)
                                    <img src="{{Storage::url($pedido->pedidodetalles[0]->producto->imagen)}}" alt="item">
                                    @endif
                                </a>
                            </td>
                            <td>
                                @foreach ($pedido->pedidodetalles as $detalle)
                                <a href="{{ route('productos.show', $detalle->producto->slug) }}">{{$detalle->producto->titulo}}</a>, 
                                @endforeach
                            </td>
                            <td class="product-price">S/. {{$pedido->monto_final}}</td>
                            <td class="product-stock-status">
                                @if ($pedido->estado == 'finalizado')
                                <span class="in-stock"><i class='bx bx-check-circle'></i> {{$pedido->estado}}</span>
                                @elseif($pedido->estado == 'pendiente')
                                <span class="out-stock"><i class='bx bx-check-circle'></i> {{$pedido->estado}}</span>
                                @endif
                            </td>
                            <td>
                                @if ($pedido->fecha_pago)
                                {{Carbon\Carbon::parse($pedido->fecha_pago)->format('d/m/Y h:i')}}
                                @endif
                            </td>
                            <td>
                                @if ($pedido->estado == 'finalizado')
                                <a href="{{ route('miCuenta.misCompras.pedido', $pedido) }}" class=""><span>Ver detalle</span></a>
                                @elseif($pedido->estado == 'pendiente')
                                <a href="/checkout?pedido={{$pedido->id}}" class=""><span>Terminar compra</span></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

@endsection