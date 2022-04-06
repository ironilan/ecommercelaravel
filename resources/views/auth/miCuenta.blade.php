@extends('layouts.principal')

@section('contenido')

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Mi cuenta</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Mi cuenta</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->



<!-- Start Partners Area -->
<div class="partners-area pb-100">
    <div class="container">
        <div class="section-title">
            <h2>Opciones</h2>
        </div>
        <div class="offer-area  pb-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                        	<div class="card-body text-center">
                        		<a href="{{ route('wishlist.lista') }}">
	                        		<h3>Lista de deseos</h3>
	                        	</a>
                        	</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                        	<div class="card-body text-center">
                        		<a href="{{ route('miCuenta.misCompras') }}">
	                        		<h3>Mis compras</h3>
	                        	</a>
                        	</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                        	<div class="card-body text-center">
                        		<a href="{{ route('miCuenta.misDatos') }}">
	                        		<h3>Mis datos</h3>
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="row mt-4 text-center">
                    <a href="{{ route('logout') }}">
                        <h3>Salir <i class="fa-solid fa-arrow-right-from-bracket"></i> </h3>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('estilos')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection