@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Términos y condiciones</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Términos y condiciones</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        

        <!-- Start Partners Area -->
        <div class="partners-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Términos y condiciones</h2>
                </div>
                <div class="">
                    {!!$legal->terminos!!}
                </div>
            </div>
        </div>
@endsection