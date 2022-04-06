<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <a href="index.php" class="logo">
                        <img src="{{asset('imagenes/logo_blanco.png')}}" alt="logo">
                    </a>
                    <ul class="footer-contact-info">
                        <li><span>Celular:</span> <a href="tel:{{setting()->cellphone}}">{{setting()->cellphone}}</a></li>
                        <li><span>Teléfono:</span> <a href="tel:{{setting()->phone}}">{{setting()->phone}}</a></li>
                        <li><span>Email:</span> <a href="#"><span class="__cf_email__" >{{setting()->email}}</span></a></li>
                        <li><span>Dirección:</span> {{setting()->address}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-4">
                    <h3>Información</h3>
                    <ul class="custom-links">
                        <li><a href="{{ url('nosotros') }}">Nosotros</a></li>
                        <li><a href="{{ url('terminos') }}">Terminos y condiciones</a></li>
                        <li><a href="{{ url('politicas') }}">Políticas de privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Servicios al cliente</h3>
                    <ul class="custom-links">
                        <li><a href="{{ url('mi-cuenta') }}">Mi cuenta</a></li>
                        {{-- <li><a href="{{ url('faq') }}">Preguntas frecuentes</a></li> --}}
                        <li><a href="{{ url('carrito') }}">Carrito</a></li>
                        <li><a href="{{ url('lista-de-deseos') }}">Lista de deseos</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Subscríbete a nuestras promociones!</h3>
                    <p>Podrás ser parte de nuestras ofertas.</p>
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="input-newsletter" placeholder="Ingresa tu email" name="EMAIL" required autocomplete="off">
                        <button type="submit"><i class='bx bx-paper-plane'></i></button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                    <div class="payment-types">
                        <div class="d-flex align-items-center">
                            
                            <ul>
                                <li><img src="{{asset('assets/img/payment/visa.png')}}" alt="visa"></li>
                                <li><img src="{{asset('assets/img/payment/mc.png')}}" alt="master-card"></li>
                                <li><img src="{{asset('assets/img/payment/paypal.png')}}" alt="paypal"></li>
                                <li><img src="{{asset('assets/img/payment/ae.png')}}" alt="american-express"></li>
                                <li><img src="{{asset('assets/img/payment/discover.png')}}" alt="discover"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <p>Copyright @ {{Date('Y')}} <span>Peruperruno</span>. Design & Developed by <a href="https://phsperu.com">PHS Perú</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class='bx bx-upvote'></i></div>

<!-- Start QuickView Modal -->
<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="image">
                            <img src="" id="imagenProd" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="content">
                            <h3><a href="producto.php" id="tituloProd">MIO Canessss</a></h3>
                            <div class="price">
                                <span class="new-price" >$150.00</span>
                                <span class="old-price" >$200.00</span>
                            </div>
                            <div class="rating" id="ratingProd">
                                
                            </div>
                            <p class="resumenProd"></p>
                            <div class="products-add-to-cart">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                                <button type="button" class="default-btn btnAddCart" onclick=""><span>Agregar al carrito</span></button>
                            </div>
                            <a href="lista-de-deseos.php" class="add-to-wishlist"><i class='bx bx-heart'></i> Agregar a tu lista de deseos</a>
                            <ul class="products-info">
                                <li id="skuProd"><span>SKU:</span> 007</li>
                                <li id="categoriaProd"><span>Categoría:</span> <a href="">Brash</a></li>
                                <li id="disponibilidadProd"><span>Disponibilidad:</span> En stock (7 items)</li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End QuickView Modal -->


{{--      modal wishlist        --}}

<div class="modal fade productsQuickView" id="modalWishlist" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal_width">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body" id="msgLista">
                <h6>Debes <a href="/login">Iniciar sesión</a> para guardar en tu lista de deseos</h6>
            </div>
        </div>
    </div>
</div>

<div class="modal fade productsQuickView" id="modalCarrito" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal_width">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body text-center">
                <img src="{{Storage::url(setting()->logo)}}" alt="" width="100">
                <h6 class="nomProdu"></h6>
                <h5 class="cn tituloMsj">Se ha agregado al carrito</h5>
            </div>
        </div>
    </div>
</div>

<!-- Start Sidebar Modal Area -->
{{-- <div class="productsFilterModal modal right fade" id="productsFilterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <aside class="widget-area">
                    <div class="widget widget_categories">
                        <h3 class="widget-title"><span>Categories</span></h3>
                        <ul>
                            <li><a href="shop-left-sidebar.html">Business</a></li>
                            <li><a href="shop-left-sidebar.html">Privacy</a></li>
                            <li><a href="shop-left-sidebar.html">Technology</a></li>
                            <li><a href="shop-left-sidebar.html">Tips</a></li>
                            <li><a href="shop-left-sidebar.html">Log in</a></li>
                            <li><a href="shop-left-sidebar.html">Uncategorized</a></li>
                        </ul>
                    </div>
                    <div class="widget widget_price_filter">
                        <h3 class="widget-title"><span>Filter by Price</span></h3>
                        <div class="collection_filter_by_price">
                            <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                        </div>
                    </div>
                    <div class="widget widget_patoi_posts_thumb">
                        <h3 class="widget-title"><span>Our Best Sellers</span></h3>
                        <article class="item">
                            <a href="producto.php" class="thumb">
                                <img src="{{asset('assets/img/products/products1.jpg')}}" alt="blog-image">
                            </a>
                            <div class="info">
                                <h4 class="title"><a href="producto.php">Pet brash</a></h4>
                                <div class="star-rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <span class="price">$150.00</span>
                            </div>
                        </article>
                        <article class="item">
                            <a href="producto.php" class="thumb">
                                <img src="{{asset('assets/img/products/products2.jpg')}}" alt="blog-image">
                            </a>
                            <div class="info">
                                <h4 class="title"><a href="producto.php">Automatic dog blue leash</a></h4>
                                <div class="star-rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <span class="price">$150.00</span>
                            </div>
                        </article>
                        <article class="item">
                            <a href="producto.php" class="thumb">
                                <img src="{{asset('assets/img/products/products3.jpg')}}" alt="blog-image">
                            </a>
                            <div class="info">
                                <h4 class="title"><a href="producto.php">Cat toilet bowl</a></h4>
                                <div class="star-rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <span class="price">$150.00</span>
                            </div>
                        </article>
                        <article class="item">
                            <a href="producto.php" class="thumb">
                                <img src="{{asset('assets/img/products/products4.jpg')}}" alt="blog-image">
                            </a>
                            <div class="info">
                                <h4 class="title"><a href="producto.php">Bowl with rubber toy</a></h4>
                                <div class="star-rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <span class="price">$150.00</span>
                            </div>
                        </article>
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title"><span>Tags</span></h3>
                        <div class="tagcloud">
                            <a href="shop-left-sidebar.html">Advertisment</a>
                            <a href="shop-left-sidebar.html">Business</a>
                            <a href="shop-left-sidebar.html">Life</a>
                            <a href="shop-left-sidebar.html">Lifestyle</a>
                            <a href="shop-left-sidebar.html">Fashion</a>
                            <a href="shop-left-sidebar.html">Ads</a>
                            <a href="shop-left-sidebar.html">Advertisment</a>
                        </div>
                    </div>
                    <div class="widget widget_follow_us">
                        <h3 class="widget-title"><span>Follow Us</span></h3>
                        <ul>
                            <li><a href="#" target="_blank">Facebook</a></li>
                            <li><a href="#" target="_blank">Twitter</a></li>
                            <li><a href="#" target="_blank">Instagram</a></li>
                            <li><a href="#" target="_blank">Pinterest</a></li>
                            <li><a href="#" target="_blank">Linkedin</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Sidebar Modal Area -->


@yield('modal')

<!-- Link of JS files -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/meanmenu.min.js')}}"></script>
<script src="{{asset('assets/js/appear.min.js')}}"></script>
<script src="{{asset('assets/js/countrySelect.min.js')}}"></script>
<script src="{{asset('assets/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/js/loopcounter.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/rangeSlider.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/js/ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>



<script>
    const verProducto = id => {
        let url = '{{ url('verProducto') }}?id='+id;
        $.get(url, function(res){
            $('#tituloProd').empty().append(res.titulo);
            $('.new-price').empty().append(res.precio_actual);
            $('.old-price').empty().append(res.precio_antes);
            $('#skuProd').empty().append(res.sku);
            $('#categoriaProd').empty().append(res.categoria);
            $('#disponibilidadProd').empty().append(res.disponibilidad);
            $('#imagenProd').attr('src',res.imagen);
            $('.resumenProd').empty().append(res.resumen);

            let attrAdd = 'addcart('+id+', 1)'; 
            $('.btnAddCart').attr('onclick', attrAdd);
            
            $('#ratingProd').empty().append(res.estrellas);
        });
    }


    // const addcart = (id, cantidad) => {
    //     let url = '{{ url('addCart') }}?id='+id+'&cantidad'+cantidad;
    //     $.get(url, function(res){
    //         var myModal = new bootstrap.Modal(document.getElementById('modalCarrito'), {
    //           keyboard: false
    //         });
    //         myModal.show();
    //         $('.nomProdu').empty().append(res.producto.titulo);
    //         $('.items_cart').empty().append(res.cantidad);

    //     });
    // }


    const addWishList = id => {
        let url = '{{ route('wishlist.agregar') }}?id='+id;
        $.get(url, function(res){
            var myModal = new bootstrap.Modal(document.getElementById('modalWishlist'), {
              keyboard: false
            });
            myModal.show();
            $('#msgLista').empty().append(res);

        });
    }



    

</script>