@extends('layouts.principal')
@section('contenido')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Lista de deseos</h1>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li>Lista de deseos</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Wishlist Area -->
<div class="wishlist-area ptb-100">
    <div class="container">
        <form>
            <div class="wishlist-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Stock Status</th>
                            <th scope="col">Comprar ahora</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($lista) > 0)
                        @foreach ($lista as $list)
                        <tr>
                            <td>
                                <a href="{{ route('productos.show', 1) }}">
                                    <img src="{{Storage::url($list->imagen)}}" alt="item">
                                </a>
                            </td>
                            <td><a href="{{ route('productos.show', 1) }}">{{$list->titulo}}</a></td>
                            <td class="product-price">S/. {{$list->precio_actual}}</td>
                            <td class="product-stock-status">
                                @if ($list->stock > 0)
                                <span class="in-stock"><i class='bx bx-check-circle'></i> En Stock</span>
                                @else
                                <span class="out-stock"><i class='bx bx-check-circle'></i> Sin Stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="/productos/{{$list->slug}}" class="default-btn"><span>Ir a comprar</span></a>
                            </td>
                            <td><a href="javascript:void(0)" onclick="removeWishList({{$list->id}})" class="remove"><i class='bx bx-trash-alt'></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-warning text-center">
                                    <h6>No tienes productos en tu lista de deseos.</h6>
                                </div>
                            </td>
                        </tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    const removeWishList = id => {
        let url = '{{ route('wishlist.eliminar') }}?id='+id;
        $.get(url, function(res){
            setTimeout(() => {
                    location.reload();
                }, 1000);
        });
    }
</script>
@endsection