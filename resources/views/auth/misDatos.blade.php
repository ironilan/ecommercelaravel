@extends('layouts.principal')

@section('contenido')

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Mis datos</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Mis datos</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->



<div class="profile-authentication-area ptb-100">
    <div class="container">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <form method="POST" autocomplete="off" id="formActualizarDatos">
                            @csrf
                            
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" required name="name" class="form-control" placeholder="Nombre" value="{{Auth::user()->name}}">
                                        @error('name')
                                        <span class="cr">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" required name="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                                        @error('email')
                                        <span class="cr">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4 mb-4">
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input value="{{Auth::user()->dni}}" type="text" required name="dni" class="form-control" placeholder="dni">
                                    </div>
                                </div>
                                <div class="col-4 mb-4">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" required name="cellphone" class="form-control" placeholder="Celular" value="{{Auth::user()->cellphone}}">
                                    </div>
                                </div>
                                <div class="col-4 mb-4">
                                    <div class="form-group">
                                        <label>Cumple</label>
                                        <input type="date" required name="cumple" class="form-control" placeholder="cumple" value="{{Auth::user()->cumple}}">
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" required name="direccion" class="form-control" placeholder="Av. example 752 - Distrito" value="{{Auth::user()->direccion}}">
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <select name="distrito" id="" class="form-control">
                                            @foreach ($distritos as $distrito)
                                            @if ($distrito->id == Auth::user()->distrito)
                                            <option value="{{$distrito->id}}" selected>{{$distrito->nombre}}</option>
                                            @else
                                            <option value="{{$distrito->id}}">{{$distrito->nombre}}</option>
                                            @endif
                                            
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <select name="departamento" id="" class="form-control">
                                            @foreach ($departamentos as $departa)
                                            @if ($departa->id == Auth::user()->departamento)
                                            <option value="{{$departa->id}}" selected>{{$departa->nombre}}</option>
                                            @else
                                            <option value="{{$departa->id}}">{{$departa->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="text-center">
                                <button class="btn btnActualizar" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="">
                        <form method="POST" id="formPassword"  autocomplete="off">
                            @csrf
                            
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" required name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label>Confirmar password</label>
                                        <input type="password" required name="password_confirmation" class="form-control" placeholder="Confirma tu password">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="text-center">
                                <button class="btn btnActualizar" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('#formActualizarDatos').submit((e) => {
        e.preventDefault();
        let token = '{{ csrf_token() }}';
        let url = '{{ url('actualizarDatos') }}';
        let data = new FormData(document.getElementById("formActualizarDatos"));
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
                
            },
            error: error => {
                console.log(error);
            }
        });
    });

    $('#formPassword').submit((e) => {
        e.preventDefault();
        let token = '{{ csrf_token() }}';
        let url = '{{ url('actualizarPassword') }}';
        let data = new FormData(document.getElementById("formPassword"));
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
                
            },
            error: error => {
                console.log(error);
            }
        });
    });
</script>
@endsection