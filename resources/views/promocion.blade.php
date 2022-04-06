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
    <div class="products-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12">
                <div class="products-details-thumbs-image">
                    <ul class="products-details-thumbs-image-slides">
                        <li><img src="{{Storage::url($promocion->imagen)}}" alt="image"></li>
                        
                    </ul>
                    <div class="slick-thumbs">
                        <ul>
                            <li><img src="{{Storage::url($promocion->imagen)}}" alt="image"></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="products-details-desc">
                    <h3>{{$promocion->titulo}}</h3>
                    <div class="price">
                        <span class="new-price">S/. {{$promocion->precio_actual}}</span>
                    </div>
                    <div class="rating">
                        @for ($i = 0; $i < $promocion->estrellas; $i++)
                        <i class='bx bxs-star'></i>
                        @endfor
                    </div>
                    <p>{{$promocion->resumen}}</p>
                    <div class="products-add-to-cart">                        
                        <button type="button" class="default-btn " style="margin-left: 0; margin-bottom: 10px" onclick="addcart({{$promocion->id}})"><span>Agregar al carrito</span></button>
                    </div>
                    
                    <ul class="products-info">
                        <li><span>Categoría:</span> <a href="perros.php">{{$promocion->categoria->titulo}}</a></li>
                        <li><span>Disponibilidad:</span> En stock ({{$promocion->stock}} items)</li>
                    </ul>
                    <div class="products-share">
                        <ul class="social">
                            <li><span>Comparte:</span></li>
                            <li><a target="_blank" class="facebook" href="https://web.facebook.com/sharer.php?u={{url()->current()}}"><i class="bx bxl-facebook"></i></a></li>
                            <li><a target="_blank" class="twitter" href="https://twitter.com/intent/tweet?url={{url()->current()}}"><i class="bx bxl-twitter"></i></a></li>
                            <li><a target="_blank" class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}"><i class="bx bxl-linkedin"></i></a></li>

                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="products-details-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Descripción</button>
                        </li>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            {!!$promocion->descripcion!!}
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
    const addcart = (id) => {
        let cantidad = 1;
        let url = '{{ url('addCart') }}?id='+id+'&cantidad='+cantidad;
        $.get(url, function(res){
            if(res.producto.msj)
            {
                var myModal = new bootstrap.Modal(document.getElementById('modalCarrito'), {
                  keyboard: false
                });
                myModal.show();
                $('.nomProdu').empty();
                $('.items_cart').empty();
                $('.tituloMsj').empty().append('No hay stock suficiente');
            }else{
                var myModal = new bootstrap.Modal(document.getElementById('modalCarrito'), {
                  keyboard: false
                });
                myModal.show();
                $('.nomProdu').empty().append(res.producto.titulo);
                $('.items_cart').empty().append(res.cantidad);
            }

        });
    }
</script>
@endsection