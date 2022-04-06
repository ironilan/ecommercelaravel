<div class="banner-area pt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="banner-slides owl-carousel owl-theme">                    
                    @foreach ($bannersPrincipal as $bp)
                    <div class="banner-content">
                        <img src="{{Storage::url($bp->imagen)}}" alt="banner-image">
                        <div class="content">
                            <h1><span>{{$bp->titulo}}</span> {{$bp->titulo2}}</h1>
                            <p>{{$bp->subtitulo}}</p>
                            <a href="{{$bp->link_btn}}" class="default-btn"><span>Comprar</span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="banner-image">
                    @foreach ($bannersVertical as $bv)
                    <a href="{{$bv->link_btn}}"><img src="{{Storage::url($bv->imagen)}}" alt="banner-image"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>