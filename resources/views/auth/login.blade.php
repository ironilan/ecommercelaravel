@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>Mi cuenta</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Mi cuenta</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Profile Authentication Area -->
        <div class="profile-authentication-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="login-form">
                            <h2>Login</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                    <span class="cr">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 remember-me-wrap">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                                            <label class="form-check-label" for="remember-me">Recordarme</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 lost-your-password-wrap">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="lost-your-password">¿Olvidaste tu contraseña?</a>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit">Log In</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="register-form">
                            <h2>Registro</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" required name="name" class="form-control" placeholder="Nombre">
                                    @error('name')
                                    <span class="cr">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                    <span class="cr">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="password" class="form-control" placeholder="Password">
                                    @error('password')
                                    <span class="cr">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirmar password</label>
                                    <input type="password" required name="password_confirmation" class="form-control" placeholder="Password">
                                </div>
                                <p class="description">El password debe contener al menos un número y minimo 8 caracteres.</p>
                                <button type="submit">Registro</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection