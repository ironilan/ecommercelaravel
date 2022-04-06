@extends('layouts.principal')

@section('contenido')

@include('components.slider')

<div class="partners-area pb-20">
    <div class="container">                
        <div class="partners-inner ">
            <div class="row justify-content-center align-items-center  owl-carousel owl-theme" id="marcas_slider">
                @foreach ($marcas as $marca)
                <div class="m-3">
                    <div class="single-partners-box">
                        <a href="{{ url('productos') }}?categoria=&subcategoria=&marca={{$marca->slug}}" class="d-block">
                            <img src="{{Storage::url($marca->imagen)}}" alt="{{$marca->titulo}}">
                        </a>
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
    </div>
</div>

<!-- Start Categories Area -->
<div class="categories-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Compra por categorías</h2>
        </div>
        <div class="categories-slides owl-carousel owl-theme">
            @foreach ($categorias as $categoria)
            <div class="single-categories-box">
                <a href="{{ url('productos') }}?categoria={{$categoria->slug}}&subcategoria=&marca=&precio=" class="d-block">
                    <img src="{{Storage::url($categoria->imagen)}}" alt="categories-image">
                    <h3>{{$categoria->titulo}}</h3>
                </a>
            </div>
            @endforeach            
        </div>
    </div>
</div>
<!-- End Categories Area -->

<!-- Start Products Area -->
@if (count($arrayProdVenta) > 0)
<div class="products-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Más vendidos</h2>
        </div>
        <div class="products-slides owl-carousel owl-theme">
            @foreach ($arrayProdVenta as $prod)
            @include('components.producto')
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- End Products Area -->

<!-- Start Offer Area -->
<div class="offer-area pb-75">
    <div class="container">
        <div class="single-offer-box">
            <a href="{{$inicio->link}}" class="d-block">
                <img src="{{Storage::url($inicio->imagen)}}" alt="offer-image">
            </a>
        </div>
    </div>
</div>
<!-- End Offer Area -->

<!-- Start Products Area -->
@if (count($productosNuevos) > 0)
<div class="products-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Novedades</h2>
        </div>
        <div class="row justify-content-center">            
            @foreach ($productosNuevos as $prod)
            <div class="col-lg-3 col-md-6 col-sm-6">
                @include('components.producto')
            </div>
            @endforeach            
        </div>
    </div>
</div>
@endif
<!-- End Products Area -->


<!-- Start Facility Area -->
<div class="facility-area">
    <div class="container">
        <div class="facility-inner bg2">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="{{ asset('assets/img/icon/icon1.png') }}" alt="icon">
                        <h3>Productos de calidad</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="{{asset('assets/img/icon/icon2.png')}}" alt="icon">
                        <h3>Delivery</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="{{asset('assets/img/icon/icon3.png')}}" alt="icon">
                        <h3>Envío a nivel nacional</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="{{asset('assets/img/icon/icon4.png')}}" alt="icon">
                        <h3>Seguridad en tus pagos</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Facility Area -->


@endsection