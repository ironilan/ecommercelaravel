<div class="col-lg-4 col-md-12 order-2 order-lg-1 order-sm-2  d-none d-sm-none d-lg-block">
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
        {{-- <div class="widget widget_price_filter">
            <h3 class="widget-title"><span>Precio máximo</span></h3>
            <div class="collection_filter_by_price">
                <input class="form-control" type="number"  name="precio" value="100" id="precioMaximo">
            </div>
        </div> --}}
        <div class="widget widget_patoi_posts_thumb">
            <h3 class="widget-title"><span>Más vendidos</span></h3>
            @foreach ($productosMasVendidos as $producto)
            <article class="item">
                <a href="{{ route('productos.show', $producto) }}" class="thumb">
                    <img src="{{Storage::url($producto->imagen)}}" alt="blog-image">
                </a>
                <div class="info">
                    <h4 class="title"><a href="{{ route('productos.show', $producto) }}">{{$producto->titulo}}</a></h4>
                    <div class="star-rating">
                        @if ($producto->estrellas)
                        @for ($i = 0; $i < $producto->estrellas; $i++)
                        <i class='bx bxs-star'></i>
                        @endfor
                        @endif
                    </div>
                    @foreach ($producto->precios as $key => $precio)
                    @if ($key == 0)
                    <span class="price">S/. {{$precio->precio}}</span>
                    @endif
                    @endforeach
                    
                </div>
            </article>
            @endforeach
           
        </div>
        
    </aside>
</div>