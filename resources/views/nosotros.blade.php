@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Nosotros</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Nosotros</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="about-area pt-100 pb-75">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="about-image">
                            <img src="{{Storage::url($nosotros->imagen_izquierda)}}" alt="about-image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-text">
                            <h2>{{$nosotros->titulo}}</h2>
                            <div>
                                {!!$nosotros->descripcion!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="about-image">
                            <img src="{{Storage::url($nosotros->imagen_derecha)}}" alt="about-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area -->

        <!-- Start Facility Area -->
        <div class="facility-area pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="facility-box">
                            <img src="{{Storage::url($nosotros->icon1)}}" alt="icon">
                            <h3>{{$nosotros->titulo_icon1}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="facility-box bg-fed3d1">
                            <img src="{{Storage::url($nosotros->icon2)}}" alt="icon">
                            <h3>{{$nosotros->titulo_icon2}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="facility-box bg-a9d4d9">
                            <img src="{{Storage::url($nosotros->icon3)}}" alt="icon">
                            <h3>{{$nosotros->titulo_icon3}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="facility-box bg-fef2d1">
                            <img src="{{Storage::url($nosotros->icon4)}}" alt="icon">
                            <h3>{{$nosotros->titulo_icon4}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Facility Area -->

        <!-- Start Feedback Area -->
        <div class="feedback-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Lo que nuestros clientes dicen</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="feedback-slides owl-carousel owl-theme">
                            @foreach ($testimonios as $test)
                            <div class="single-feedback-box">
                                <p>{{$test->texto}}</p>
                                <div class="client-info">
                                    <img src="{{Storage::url($test->imagen)}}" alt="user">
                                    <h3>{{$test->nombre}}</h3>
                                    <span>{{$test->cargo}}</span>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="col-lg-6 xol-md-12">
                        <div class="video-box">
                            <img src="assets/img/video.jpg" alt="video-image">
                            <a href="https://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-video"><i class='bx bx-play'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Feedback Area -->

        <!-- Start Team Area -->
        <div class="team-area pb-75">
            <div class="container">
                <div class="section-title">
                    <h2>Nuestros fundadores</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach ($equipos as $equipo)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team-member">
                            <img src="{{Storage::url($equipo->imagen)}}" alt="team-image">
                            <h3>{{$equipo->nombre}}</h3>
                            <span>{{$equipo->nombre}}</span>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
        <!-- End Team Area -->

        <!-- Start Partners Area -->
        <div class="partners-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Nuestras marcas</h2>
                </div>
                <div class="partners-inner">
                    <div class="row justify-content-center align-items-center">
                        @foreach ($marcas as $marca)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <div class="single-partners-box">
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