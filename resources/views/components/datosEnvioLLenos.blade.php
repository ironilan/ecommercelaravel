
{{-- <p>Si quieres colocar nuevamente los datos de envio <a href="/checkout">Has click aquí</a></p> --}}
<ul>
	
	<li><strong>Nombre:</strong> <small>{{$datos->nombre}} {{$datos->apellido}}</small></li>
	<li><strong>Telefono:</strong> <small>{{$datos->telefono}} </small></li>
	<li><strong>Email:</strong> <small>{{$datos->email}} </small></li>
	@if ($datos->direccion)
	<li><strong>Departamento:</strong> <small>{{$datos->depart->nombre}} </small></li>
	<li><strong>Distrito:</strong> <small>{{$datos->distrit->nombre}} </small></li>
	<li><strong>Dirección:</strong> <small>{{$datos->direccion}} </small></li>
	<li><strong>Referencia:</strong> <small>{{$datos->referencia}} </small></li>
	@endif	

</ul>