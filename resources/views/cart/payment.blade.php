@extends('layouts.principal')

@php
    $subtotal = formatoNumero(Cart::getSubTotal());
    $total = formatoNumero(Cart::getTotal());
    $cartConditions = Cart::getConditions();

    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();


    $preference->back_urls = array(
        "success" => "https://development.peruperruno.pe/success",
        "failure" => "https://development.peruperruno.pe/failure",
        "pending" => "https://development.peruperruno.pe/pending"
    );
    $preference->auto_return = "approved";

    if (count(Cart::getContent()) > 0) {
        $precio = Cart::getTotal();
    }else{
        $precio = $pedido->monto_final;
    }

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Pedido Peru perruno';
    $item->quantity = 1;
    $item->unit_price = $precio;
    $preference->items = array($item);
    $preference->save();
@endphp

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Payment</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Payment</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Checkout Area -->
        <div class="checkout-area ptb-100">
            <div class="container">                
                
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="order-details">
                                <h3>Tu orden</h3>
                                <div class="order-table table-responsive">
                                    @if(count(Cart::getContent()) > 0)
                                        @include('cart.paymentConCarrito')
                                    @else
                                        @include('cart.paymentSinCarrito')
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
                                            
                                        </p>
                                        
                                    </div>
                                    <div class="cho-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>

@endsection

@section('scripts')

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
    locale: "es-PE",
  });

  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: "{{$preference->id}}",
    },
    render: {
      container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: "Procesar pedido", // Cambia el texto del botón de pago (opcional)
    },
  });
</script>

<script>
    


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

@section('estilos')

<style>
    .payment-box{
        display: flex;
    }
    .payment-method{
        width: 50%;
    }
    .cho-container{
        text-align: right;
        width: 50%;
        padding-top: 1rem;
    }

    .mercadopago-button{
        font-size: 20px!important;
    }
</style>
@endsection