@extends('cliente_layout.master')
@section('title', 'Tienda | Pago PayPal')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pago Con PayPal</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tienda</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <form class="mt-3 collapse review-form-box" id="formRegister">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Nombre</label>
                                <input type="text" class="form-control" id="InputName" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Apellido</label>
                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email </label>
                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Contraseña</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Registrar</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    @if (Session::has('error'))
                        <div class="alter alter-danger"> {{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alter alter-success">{{ Session::get('success') }} </div>
                    @endif
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Valor a Pagar </h3>
                        </div>
                        {{-- <form action="{{ route('ordendelproducto') }}" method="POST"> --}}
                        <form action="{{ route('requestpayment') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="amount">Valor </label>
                                <input type="number" name="amount" class="form-control" placeholder="19.99" step="0.01"
                                    min="1" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <hr class="mb-4">
                            <div class="col-md-12 mb-12">
                                <input type="submit" value="Pagar Ahora" class="btn btn-default hvr-hover btn-cart w-100">
                            </div>
                            <hr class="mb-1">
                        </form>
                    </div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=env('PAYPAL_SANDBOX_CLIENT_ID')"></script>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Valor a Pagar</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Productos</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> $ 440 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Descuento</h4>
                                    <div class="ml-auto font-weight-bold"> $ 40 </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Cupón de Descuento</h4>
                                    <div class="ml-auto font-weight-bold"> $ 10 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Impuestos</h4>
                                    <div class="ml-auto font-weight-bold"> $ 2 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Costo de Envío</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Total Final</h5>
                                    <div class="ml-auto h5"> $ 388 </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
