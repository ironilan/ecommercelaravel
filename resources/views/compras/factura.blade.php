@extends('layouts.principal')

@section('contenido')
<div class="pt-100 pb-100">
	
<div class="container">
	<h4 class="text-center">Pedido {{$pedido->id}}</h4>
	<hr>
	<p><strong>Fecha de compra:</strong> {{$pedido->fecha_pago}}</p>
	@if ($pedido->cod_cupon)
	<p><strong>Cupon:</strong> {{$pedido->cod_cupon}}</p>
	<p><strong>Descuento:</strong> {{$pedido->dscto_cupon}}</p>
	@endif
	<p><strong>Cargo:</strong> {{$pedido->cargo}}</p>
	<hr>
	@if ($pedido->envio)
	<p><strong>Envio:</strong> {{$pedido->envio->titulo}} - {{$pedido->envio->precio}}</p>
	@endif
	<p>Datos de envío</p>
	<ul>
		<li>Nombre: {{$pedido->datosenvios->nombre}} {{$pedido->datosenvios->apellido}}</li>
		<li>Teléfono: {{$pedido->datosenvios->telefono}}</li>
		<li>Email: {{$pedido->datosenvios->email}}</li>
		@if ($pedido->envio)
		@if ($pedido->envio_id != 1)
			@php
				$distrito = App\Models\Distrito::find($pedido->datosenvios->distrito);
				$departamento = App\Models\Departamento::find($pedido->datosenvios->departamento);
			@endphp
			<li>Departamento: {{$departamento->nombre}}</li>
			<li>Distrito: {{$distrito->nombre}}</li>
			<li>Dirección: {{$pedido->datosenvios->direccion}}</li>
			<li>Referencia: {{$pedido->datosenvios->referencia}}</li>
		@endif
		@else
		<li style="text-decoration: underline; color: blueviolet;">Recojo en tienda</li>
		@endif
	</ul>
	<hr>
	<table class="table table-bordered">
		<thead>
	        <tr>           
	            <th scope="col">Producto</th>
	            <th scope="col">Precio</th>
	            <th scope="col">Cantidad</th>
	            <th scope="col">Total</th>
	        </tr>
	    </thead>
	    <tbody>
	        

	        @foreach ($pedido->pedidodetalles as $detalle)

	        <tr >            
	            <td class="product-thumbnail">
	               {{$detalle->producto->titulo}}
	            </td>
	            <td>S/. {{formatoNumero($detalle->precio)}}</td>
	            <td class="product-quantity">
	                {{$detalle->cantidad}}
	            </td>
	            <td>S/. {{$detalle->precio * $detalle->cantidad}}</td>
	        </tr>
	        @endforeach  

	        
	                              
	    </tbody>
	</table>
</div>
<div class="return text-center " style="margin-top: 3rem;">
	<a href="/mi-cuenta/mis-compras" style="font-size: 20px;">Regresar</a>
</div>
</div>
@endsection