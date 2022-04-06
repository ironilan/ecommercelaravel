@extends('layouts.principal')

@php
    $subtotal = formatoNumero(Cart::getSubTotal());
    $total = formatoNumero(Cart::getTotal());
    $cartConditions = Cart::getConditions();

    //dd($cartConditions);
    //dd(session('pedido'));
@endphp

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Checkout Area -->
        <div class="checkout-area ptb-100">
            <div class="container">                
                <form id="formDatosdeEnvio">
                    {{-- <input type="text" name="pedido" value=""> --}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="order-details">
                                <h3>Tipo de envío</h3>
                                <div class="alert alert-warning">
                                    <p>Si tu distrito no está aquí, por favor comunicate con este whatsapp <a href="https://wa.me/{{setting()->cellphone}}" target="_blank">{{setting()->cellphone}}</a></p>
                                </div>
                                @include('components.tipoEnvio')
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12" >
                            <div class="order-details">
                                <h3>Datos de envío</h3>
                                
                                <div class="billing-details">
                                    @if ($datosEnvioLLenos)
                                        @include('components.datosEnvioLLenos')
                                    @else
                                        @include('components.datosEnvio')
                                    @endif
                                </div>                                
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="order-details">
                                <h3>Tu orden</h3>
                                <div class="order-table table-responsive">
                                    @if(count(Cart::getContent()) > 0)
                                        
                                        @include('cart.pedidoConCarrito')
                                    @else
                                        @include('cart.pedidoSinCarrito')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="order-details">
                                
                                <div class="payment-box">
                                    <div class="payment-method">
                                        
                                       
                                        <p>
                                            <input type="radio" id="mercado" name="radio-group" checked>
                                            <label for="mercado">Mercado Pago</label>
                                            <img src="{{ asset('assets/img/mercado.png') }}" alt="mercado">
                                            Sus datos personales se utilizarán para procesar su pedido, respaldar su experiencia en este sitio web y para otros fines descritos en nuestras <a href="{{ url('politicas') }}">políticas de privacidad</a>.
                                        </p>
                                        
                                    </div>
                                    @if (Session::has('pedido'))
                                        @if (session('pedido') == request()->get('pedido'))
                                        <a class="default-btn" href="payment?pedido={{session('pedido')}}">Terminar tu compra</a>
                                        @else
                                        <button type="submit" class="default-btn"><span>Realizar pedido</span></button>
                                        @endif
                                    @elseif(request()->pedido)
                                        <a class="default-btn" href="payment?pedido={{request()->pedido}}">Terminar tu compra</a>
                                    @else
                                        <button type="submit" class="default-btn"><span>Realizar pedido</span></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

@section('scripts')


<script>
    $('#formDatosdeEnvio').submit((e) => {
        e.preventDefault();
        let token = '{{ csrf_token() }}';
        let url = '{{ url('realizarPedido') }}';
        let data = new FormData(document.getElementById("formDatosdeEnvio"));
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
                location.href = '/payment?pedido='+res.id;
            },
            error: error => {
                console.log(error);
            }
        });
    });


    $('input[name=envio]').change(function(event) {
        //console.log('sss', this.value);
        if (this.value != 1) {
            $('#datosdeenvio').show();            
        }else{
            $('#datosdeenvio').hide();
        }

        let urlDatosEnvio = '{{ url('datosenvios') }}?id='+this.value;
        $.get(urlDatosEnvio, function(res){
            $('.precioEnvio').empty().append(res.precio);
            $('.getTotal').empty().append(res.total);
            $('.getSubTotal').empty().append(res.subtotal);
        });
    });
</script>
@endsection