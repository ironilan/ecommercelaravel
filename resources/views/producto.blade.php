
@extends('layouts.principal')

@section('contenido')

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Producto</h1>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>Producto</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Products Details Area -->
<div class="products-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12">
                <div class="products-details-thumbs-image">
                    <ul class="products-details-thumbs-image-slides">
                        <li><img src="{{Storage::url($producto->imagen)}}" alt="image"></li>
                        @foreach ($producto->imagens as $img)
                        <li><img src="{{Storage::url($img->imagen)}}" alt="image"></li>
                        @endforeach
                    </ul>
                    <div class="slick-thumbs">
                        <ul>
                            <li><img src="{{Storage::url($producto->imagen)}}" alt="image"></li>
                            @foreach ($producto->imagens as $img)
	                        <li><img src="{{Storage::url($img->imagen)}}" alt="image"></li>
	                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="products-details-desc">
                    <h3>{{$producto->titulo}}</h3>

                    <div class="rating">
                        @for ($i = 0; $i < $producto->estrellas; $i++)
			            <i class='bx bxs-star'></i>
			            @endfor
                    </div>
                    <p>{{$producto->resumen}}</p>
                    <div class="price">
                        
                        @if ($producto->precios)
                        <div class="row">
                            <div class="col-4">

                                <select name="" id="appPrecio" class="form-control">

                                    @foreach ($producto->precios as $precio)
                                        <option value="{{$precio->id}}">{{$precio->titulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-8">
                                <span class="new-price appPrecioSolo">S/. </span>
                            </div>
                        </div>
                        @else
                        <span class="new-price">Producto no disponible</span>
                        @endif
                    </div>
                    @if ($producto->stock > 0)
                    <div class="products-add-to-cart">
                        <div class="input-counter">
                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                            <input type="text" value="1" id="cantidad">
                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                        </div>

                        <button type="submit" class="default-btn" onclick="addcart({{$producto->id}})">
                            <span>Agregar al carrito</span>
                        </button>
                    </div>
                    @endif
                    
                    @if (Auth::guest())
                    <a href="javascript:void(0)" class="add-to-wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"><i class='bx bx-heart'></i> Agregar a la lista de deseos</a>                   
                    @else                    
                    <a href="javascript:void(0)" class="add-to-wishlist" onclick="addWishList({{$producto->id}});"><i class='bx bx-heart'></i> Agregar a la lista de deseos</a>
                    @endif
                    
                    <ul class="products-info">
                        @if ($producto->sku)
                        <li><span>SKU:</span> {{$producto->sku}}</li>
                        @endif
                        <li><span>Categoría:</span> <a href="perros.php">{{$producto->categoria->titulo}}</a></li>
                        <li><span>Disponibilidad:</span> {{$producto->stock < 1 ? 'Sin stock' : 'En stock'}}  ({{$producto->stock}} items)</li>
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
                        <li class="nav-item">
                            <button class="nav-link" id="additional-information-tab" data-bs-toggle="tab" data-bs-target="#additional-information" type="button" role="tab" aria-controls="additional-information" aria-selected="false">Información adicional</button>
                        </li>
                        <!-- <li class="nav-item">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Revistas</button>
                        </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            {!!$producto->descripcion!!}
                        </div>
                        <div class="tab-pane fade" id="additional-information" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        @foreach ($producto->infoproductos as $info)
                                        <tr>
                                            <td>{{$info->etiqueta}}</td>
                                            <td>{{$info->valor}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('estilos')
<style>
    .appPrecioSolo{
        font-size: 25px!important;
    }
</style>

@endsection

@section('scripts')
<script>
    $('#appPrecio').change(function(){
        let idprecio = $(this).val();
        cambiarPeso(idprecio);
        
    });


    const cambiarPeso = idprecio => {
        let url = '{{ url('cambiarPrecio') }}?idprecio='+idprecio;
        $.get(url, function(res){
            $('.appPrecioSolo').empty().append('S/. '+parseFloat(res.precio).toFixed(2));
        });
    }


    @if (count($producto->precios))
    $(document).ready(function(){
        cambiarPeso({{$producto->precios[0]->id}});
    });
    @endif


    const addcart = (id) => {
        let cantidad = $('#cantidad').val();
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