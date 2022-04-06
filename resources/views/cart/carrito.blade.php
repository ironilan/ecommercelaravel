@extends('layouts.principal')

@php
    $subtotal = formatoNumero(Cart::getSubTotal());
    $total = formatoNumero(Cart::getTotal());
@endphp

@section('contenido')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Carrito</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Carrito</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Cart Area -->
<div class="cart-area ptb-100">
    <div class="container">
       
            <div class="cart-table table-responsive">
                <table class="table table-bordered" id="tableCart">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count(Cart::getContent()) > 0)

                       {{--  {{Cart::getContent()}} --}}

                        @foreach (Cart::getContent() as $cart)

                        <tr >
                            <td><a href="javascript:void(0)" onclick="deleteProd('{{$cart->id}}')" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="/productos/{{$cart->attributes['slug']}}">
                                    <img src="{{$cart->attributes['imagen']}}" alt="item">
                                    <h3>{{$cart->name}}</h3>
                                </a>
                            </td>
                            <td>S/. {{formatoNumero($cart->price)}}</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn" onclick="updateProd('{{$cart->id}}', 'men')"><i class='bx bx-minus'></i></span>
                                    <input type="text"  value="{{$cart->quantity}}" class="cant{{$cart->id}}">
                                    <span class="plus-btn" onclick="updateProd('{{$cart->id}}', 'mas')"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>S/. {{formatoNumero($cart->quantity * $cart->price)}}</td>
                        </tr>
                        @endforeach  

                        @else
                        <tr>
                            <h6>No tienes items en tu carrtio.</h6>
                        </tr>
                        @endif
                                              
                    </tbody>
                </table>
            </div>
            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-12 col-md-7">
                        <form id="formCodigoDscto" autocomplete="off">
                            <div class="shopping-coupon-code">
                                <input type="text" required class="form-control" placeholder="Código de cupón" name="codigo" id="coupon-code">
                                @if (Auth::guest())
                                <button data-bs-toggle="modal" data-bs-target="#modalCupon">Aplicar cupón</button>
                                @else
                                <button type="submit">Aplicar cupón</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-md-5 text-end">
                        <a href="/carrito" class="default-btn"><span>Actualizar carrito</span></a>
                    </div>
                </div>
            </div>
            <div class="cart-totals">
                <ul>
                    <li>Subtotal 
                        <span>
                            S/. {{$subtotal}}
                        </span>
                    </li>

                        @php
                                $cartConditions = Cart::getConditions();

                        @endphp
                        @foreach($cartConditions as $condition)
                            @if ($condition->getName() == 'cupon')
                                <li>{{$condition->getName()}} <span>- S/. {{formatoNumero($condition->getCalculatedValue(Cart::getSubTotal()))}}</span></li> 
                            @endif                       
                        @endforeach

                    
                    <li>Total <span>S/. {{$total}}</span></li>
                </ul>
                <a href="{{ url('checkout') }}" class="default-btn"><span>Procesar pago</span></a>
            </div>
    </div>
</div>

@endsection

@section('modal')

<div class="modal fade productsQuickView" id="modalCupon" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal_width">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body" id="msgCupon">
                <h6>Debes <a href="/login">Iniciar sesión</a> para aplicar tu cupón</h6>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    const updateProd = (idprod, tipo) => {
        let cant = parseInt($('.cant'+idprod).val());
        
        if (tipo == 'men') {
            cant = cant > 0 ? cant - 1 : 0;
        }else{
            cant = cant + 1;
        }

        let url = '{{ url('updateCart') }}?idprod='+idprod+'&cant='+cant;
        $.get(url, res => {
            
        });
    }


    const deleteProd = idprod => {
        let url = '{{ url('deleteCart') }}?idprod='+idprod;
        $.get(url, res => {
            setTimeout(() => {
                location.reload();
            }, 1500);
        });
    }

    $('#formCodigoDscto').submit((e) => {
        e.preventDefault();
        let token = '{{ csrf_token() }}';
        let url = '{{ url('valida-cupon') }}';
        let data = new FormData(document.getElementById("formCodigoDscto"));
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
                if (res.success) {
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }else{
                    var myModal = new bootstrap.Modal(document.getElementById('modalCupon'), {
                      keyboard: false
                    });
                    myModal.show();
                    $('#msgCupon').empty().append(res.msj);
                }
            },
            error: error => {
                console.log(error);
            }
        });
    });
</script>
@endsection