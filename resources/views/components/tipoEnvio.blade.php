<div class="order-table table-responsive">
    <div class="payment-method">
        
        @foreach ($envios as $envio)
        @if (Session::has('idenvio'))
        <p>
        <input type="radio" id="envio{{$envio->id}}" name="envio" value="{{$envio->id}}" {{$envio->id == session('idenvio') ? 'checked' : ''}}>
        <label for="envio{{$envio->id}}">{{$envio->titulo}} - <strong>S/. {{formatoNumero($envio->precio)}}</strong></label>
        </p>
        @else
        <p>
        <input type="radio" id="envio{{$envio->id}}" name="envio" value="{{$envio->id}}" {{$envio->id == 1 ? 'checked' : ''}}>
        <label for="envio{{$envio->id}}">{{$envio->titulo}} - <strong>S/. {{formatoNumero($envio->precio)}}</strong></label>
        </p>
        @endif
        
        @endforeach
        
    </div>
</div>