<table class="table table-bordered">
                                        <tbody>
                                            @foreach (Cart::getContent() as $cart)
                                            <tr>
                                                <td class="product-name"><a href="/productos/{{$cart->attributes['slug']}}">{{$cart->name}}</a></td>
                                                <td class="product-total">
                                                    <span class="subtotal-amount">S/. {{formatoNumero($cart->price)}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            <tr>
                                                <td class="order-subtotal"><span>Subtotal</span></td>
                                                <td class="order-subtotal-price">
                                                    <span class="order-subtotal-amount getSubTotal">S/. {{$subtotal}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-shipping"><span>Envío</span></td>
                                                <td class="shipping-price">
                                                    @if ($cartConditions)
                                                        @foreach ($cartConditions as $condi)
                                                            @if ($condi->getName() == 'envio')
                                                                <span class="precioEnvio">S/. {{formatoNumero($condi->getValue())}}</span>
                                                            
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="precioEnvio">S/. 0.00</span>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="total-price"><span>Total</span></td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount getTotal">S/. {{$total}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>