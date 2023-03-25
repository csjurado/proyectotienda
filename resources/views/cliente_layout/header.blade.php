<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>¥ JPY</option>
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Llamanos:- <a href="#"> +593983990005 </a></p>
                </div>
                <div class="our-link">
                    <ul>
                        @if (Session::has('cliente'))
                            <li><a href="{{ route('logout') }}"><i class="fa fa-user s_color"></i>Cerrar Sesión</a></li>
                        @else
                            <li><a href="{{ route('cliente.inicarsesion') }}"><i class="fa fa-user s_color"></i>Iniciar
                                    Sesión</a></li>
                        @endif

                        <li><a href="#"><i class="fas fa-location-arrow"></i> Ubicación</a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> Contactanos </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="login-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                        <option>Registrar</option>
                        <option>Iniciar Sesión</option>
                    </select>
                </div>
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('cliente.inicio') }}"><img src="frontend/images/logo.png"
                        class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('cliente.inicio') }}">Inicio</a></li>
                    <li class="nav-item {{ request()->is('tienda') ? 'active' : '' }}">
                        <a href="{{ route('cliente.shop') }}" class="nav-link">Tienda</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            {{-- <span class="badge">{{ Session::has('carrito') ? Session::get('carrito')->totalQyt : 0 }}</span> --}}
                            <span class="badge">
                                {{ Session::has('carrito') ? Session::get('carrito')->totalQty : 0 }}</span>
                            <p>Mi Carrito</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    @if (Session::has('topCart'))
                        @foreach (Session::get('topCart') as $producto)
                            <li>
                                <a href="#" class="photo"><img
                                        src="{{  $producto['producto_imagen'] }}"
                                        class="cart-thumb" alt="" /></a>
                                <h6><a href="#">{{ $producto['producto_nombre'] }} </a></h6>
                                <p>{{ $producto['qty'] }}x - <span class="price">$
                                        {{ $producto['producto_precio'] }}</span></p>
                            </li>
                        @endforeach
                    @endif

                    <li class="total">
                        <a href="{{ route('cliente.carro') }}" class="btn btn-default hvr-hover btn-cart">VER
                            CARRITO</a>
                        <span class="float-right"><strong>Total</strong>
                            $ {{ Session::has('carrito') ? Session::get('carrito')->totalPrice : 0 }}</span>
                        {{-- <span class="float-right"><strong>Total</strong>: $999.99</span> --}}
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<form>
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
</form>
<!-- End Top Search -->
