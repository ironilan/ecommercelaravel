@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Marcas</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Marcas</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        

        <!-- Start Partners Area -->
        <div class="partners-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Marcas</h2>
                </div>
                <div class="">
                    <div class="row justify-content-center align-items-center">
                        @foreach ($marcas as $marca)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4 mb-5">
                            <div class="">
                                <a href="/productos?categoria=&subcategoria=&marca={{$marca->slug}}" class="d-block">
                                    <img src="{{Storage::url($marca->imagen)}}" alt="brands">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection