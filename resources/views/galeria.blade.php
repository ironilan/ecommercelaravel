@extends('layouts.principal')

@section('contenido')
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Galería</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Galería</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->



<!-- Start Partners Area -->
<div class="partners-area pb-100">
    <div class="container">
        <div class="section-title">
            <h2>Galería</h2>
        </div>
        <div class="offer-area  pb-75">
            <div class="container">
                <div class="row justify-content-center">
                   
                    @foreach ($galeria as $gal)
                    @if ($gal->tipo == 'video')
                    <div class="col-lg-4 col-md-6">
                        <iframe style="width: 100%; height: 260px;" src="https://www.youtube.com/embed/{{$gal->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                    @else
                    <div class="col-lg-4 col-md-6">
                        <div class="single-offer-box">
                            <a href="#" class="d-block">
                                <img src="{{Storage::url($gal->imagen)}}" alt="offer-image">
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach                  
                </div>
            </div>
        </div>

    </div>
</div>
@endsection