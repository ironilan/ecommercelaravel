@php
    $total = $pedido->monto_final + $pedido->envio->precio;
@endphp
<table class="table table-bordered">
    <tbody>
        @foreach ($pedido->pedidodetalles as $ped)
        <tr>
            <td class="product-name"><a href="/productos/{{$ped->producto->slug}}">{{$ped->producto->titulo}}</a></td>
            <td class="product-total">
                <span class="subtotal-amount">S/. {{formatoNumero($ped->precio)}}</span>
            </td>
        </tr>
        @endforeach
        
        <tr>
            <td class="order-subtotal"><span>Subtotal</span></td>
            <td class="order-subtotal-price">
                <span class="order-subtotal-amount getSubTotal">S/. {{formatoNumero($pedido->monto_final)}}</span>
            </td>
        </tr>
        <tr>
            <td class="order-shipping"><span>Envío</span></td>
            <td class="shipping-price">
                
                @if ($pedido->envio)
                    <span class="precioEnvio">S/. {{formatoNumero($pedido->envio->precio)}}</span>

                @else
                <span class="precioEnvio">S/. 0.00</span>
                @endif
                
            </td>
        </tr>
        <tr>
            <td class="total-price"><span>Total</span></td>
            <td class="product-subtotal">
                <span class="subtotal-amount getTotal">S/. {{formatoNumero($total)}}</span>
            </td>
        </tr>
    </tbody>
</table>