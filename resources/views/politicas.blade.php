@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Políticas de privacidad</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Políticas de privacidad</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        

        <!-- Start Partners Area -->
        <div class="partners-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Políticas de privacidad</h2>
                </div>
                <div class="">
                    {!!$legal->politicas!!}
                </div>
            </div>
        </div>
@endsection