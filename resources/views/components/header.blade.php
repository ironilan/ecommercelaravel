@php
    if (isset($pagina)) {
        $pagina = $pagina;
    }else{
        $pagina = 'inicio';
    }
@endphp

<div class="top-header-area white-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- <p>Envío a nivel nacional</p> -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="search-box">
                    <form action="/productos">
                        <input type="text" name="criterio" class="input-search" placeholder="Ingresar palabra clave...">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <ul>
                    @if (setting()->facebook)
                    <li><a href="{{setting()->facebook}}" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                    @endif
                    @if (setting()->instagram)
                    <li><a href="{{setting()->instagram}}" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                    @endif
                    @if (setting()->tiktok)
                    <li><a href="{{setting()->tiktok}}" target="_blank"><i class='bx bxl-tiktok'></i></a></li>
                    @endif
                    @if (setting()->twitter)
                    <li><a href="{{setting()->twitter}}" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                    @endif
                    @if (setting()->youtube)
                    <li><a href="{{setting()->youtube}}" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                    @endif
                    @if (setting()->linkedin)
                    <li><a href="{{setting()->linkedin}}" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="navbar-area white-color">
    <div class="patoi-responsive-nav">
        <div class="container">
            <div class="patoi-responsive-menu">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('imagenes/logo_blanco.png') }}" alt="logo"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="patoi-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('imagenes/logo_blanco.png') }}" alt="logo"></a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('productos') }}" class="dropdown-toggle nav-link {{$pagina == 'inicio' ? 'active' : ''}}">Productos</a>
                            <ul class="dropdown-menu">
                                @foreach (categorias() as $cat)
                                <li class="nav-item"><a href="{{ url('productos') }}?categoria={{$cat->slug}}&subcategoria=&marca=&precio=" class="nav-link">{{$cat->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{ route('promociones') }}" class=" nav-link {{$pagina == 'promociones' ? 'active' : ''}}">Promociones</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('marcas')}}" class=" nav-link {{$pagina == 'marcas' ? 'active' : ''}}">Marcas</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('nosotros')}}" class=" nav-link {{$pagina == 'nosotros' ? 'active' : ''}}">Nosotros</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('galeria')}}" class=" nav-link {{$pagina == 'galeria' ? 'active' : ''}}">Galería</a>
                        </li>
                    </ul>
                    <div class="others-option">
                        <div class="d-flex align-items-center">
                            <ul>
                                @if(Auth::guest())
                                <li><a href="{{ url('login') }}"><i class='bx bx-user-circle'></i></a></li>
                                @else
                                <li><a href="{{ url('mi-cuenta') }}"><i class='bx bx-user-circle'></i></a></li>
                                @endif
                                
                                <li style="position: relative;"><a href="{{ url('carrito') }}"><i class='bx bx-cart'></i><span class="items_cart">{{count(Cart::getContent())}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="option-inner">
                    <div class="others-option">
                        <ul>
                            <li><a href="{{ url('mi-cuenta') }}"><i class='bx bx-user-circle'></i></a></li>
                            <li><a href="{{ url('carrito') }}"><i class='bx bx-cart'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
