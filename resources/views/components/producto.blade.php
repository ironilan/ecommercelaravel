<div class="single-products-box">
    <div class="image">
        <a href="{{ route('productos.show', $prod) }}" class="d-block">
            <img src="{{Storage::url($prod->imagen)}}" alt="products-image">
        </a>
        @if ($prod->nuevo == 'si')
        <span class="on-sale">Nuevo!</span>
        @endif
        <ul class="products-button">
            {{-- <li><a href="javascript:void(0)" onclick="addcart({{$prod->id}})"><i class='bx bx-cart-alt'></i></a></li> --}}
            @if (Auth::guest())
            <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalWishlist" ><i class='bx bx-heart'></i></a></li>
            @else
            <li><a href="javascript:void(0)"  onclick="addWishList({{$prod->id}})"><i class='bx bx-heart'></i></a></li>
            @endif
            
            {{-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView" onclick="verProducto({{$prod->id}})"><i class='bx bx-show'></i></a></li> --}}
            <li><a href="{{ route('productos.show', $prod) }}"><i class='bx bx-link-alt'></i></a></li>
        </ul>
    </div>
    <div class="content">
        <h3><a href="{{ route('productos.show', $prod) }}">{{$prod->titulo}}</a></h3>
        <div class="price">
            @if ($prod->precios)
            @foreach ($prod->precios as $key => $precio)
            @if ($key == 0)
           <span class="new-price">S/. {{formatoNumero($precio->precio)}}</span>
            @endif
            @endforeach
            @endif
        </div>
        <div class="rating">
            @if ($prod->estrellas)
            @for ($i = 0; $i < $prod->estrellas; $i++)
            <i class='bx bxs-star'></i>
            @endfor
            @endif
        </div>
    </div>
</div>