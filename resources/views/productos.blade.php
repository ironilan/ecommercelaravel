@extends('layouts.principal')

@section('contenido')

@php
    //dd(request()->fullurl())
@endphp
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Productos </h1>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>Productos </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Products Area -->
<div class="products-area ptb-100">
    <div class="container">
        <div class="row">
            @include('components.sidebar')
            <div class="d-block d-lg-none">
                <aside class="widget-area">
                    <div class="widget widget_categories">
                        <h3 class="widget-title"><span>Subcategorías</span></h3>
                        <ul>
                            @foreach ($subcategorias as $subcat)
                            <li><a href="{{url('productos')}}?categoria={{request()->get('categoria')}}&subcategoria={{$subcat->slug}}">{{$subcat->titulo}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget-title"><span>Marcas</span></h3>
                        <ul>
                            @foreach ($marcas as $marca)
                            <li><a href="{{url('productos')}}?categoria={{request()->get('categoria')}}&subcategoria={{request()->get('subcategoria')}}&marca={{$marca->slug}}">{{$marca->titulo}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-8 col-md-12  order-1 order-sm-1 order-lg-2">
                <div class="patoi-grid-sorting row align-items-center">
                    <div class="col-lg-6 col-md-6 result-count">
                        <p>Hay <span class="count">{{count($productos)}}</span> productos disponibles para ti</p>
                    </div>
                    <div class="col-lg-6 col-md-6 ordering">
                        {{-- <div class="select-box">
                            <label>Ordenar por:</label>
                            <select name="order" id="order">
                                <option value="1">Defecto</option>
                                <option value="2">Popularidad</option>
                                <option value="3">Últimos</option>
                                <option value="4">Precio</option>
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($productos as $prod)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        @include('components.producto')
                    </div>
                    @endforeach  
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="pagination-area">
                            {{$productos->appends([
                                        'categoria'=>request()->get('categoria'),
                                        'subcategoria'=>request()->get('subcategoria'),
                                        'marca'=>request()->get('marca'),
                                        'search'=>request()->get('search'),
                                        ])->links()}}
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection