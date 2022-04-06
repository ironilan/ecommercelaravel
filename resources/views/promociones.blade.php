@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Promociones</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Promociones</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        

        <!-- Start Partners Area -->
        <div class="partners-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Promociones</h2>
                </div>
                <div class="offer-area  pb-75">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($promociones as $prom)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-offer-box">
                                    <a href="/promociones/{{$prom->slug}}" class="d-block">
                                        <img src="{{Storage::url($prom->imagen)}}" alt="offer-image">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection