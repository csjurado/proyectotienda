@extends('cliente_layout.master')
@section('title', 'Tienda | Carrito')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Carrito</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tienda</a></li>
                        <li class="breadcrumb-item active">Carrito</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        @if (Session::has('status'))
                            <div class="alter alter-success">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has('topCart'))
                                    @foreach (Session::get('topCart') as $producto)
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid"
                                                        src="{{ $producto['producto_imagen'] }}"
                                                        alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                                    {{ $producto['producto_nombre'] }}
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>$ {{ $producto['producto_precio'] }}</p>
                                            </td>
                                            <td class="quantity-box">
                                                <form
                                                    action="{{ route('cliente.actualizarcarrito', [$producto['producto_id']]) }}"
                                                    method="POST">
                                                    @csrf @method('PUT')
                                                    <input type="number" name="qty" size="4"
                                                        value="{{ $producto['qty'] }}" min="1" step="1"
                                                        class="c-input-text qty text">
                                                    <br>
                                                    <input type="submit" value="Actualizar" class="btn btn-warning">
                                                </form>
                                            </td>
                                            <td class="total-pr">
                                                <p>$ {{ number_format($producto['producto_precio'] * $producto['qty'], 2) }}
                                                </p>
                                            </td>
                                            <td class="remove-pr">
                                                <a
                                                    href="{{ route('cliente.removerdelcarrito', [$producto['producto_id']]) }}">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Código del Cupón" aria-label="Coupon code"
                                type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Aplicar Cupón</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Detalle de Compra</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Descuento</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Descuento con Cupón</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Impuesto</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Costo de Envío</h4>
                            <div class="ml-auto font-weight-bold"> Gratis </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Total a pagar </h5>
                            <div class="ml-auto h5"> $
                                {{ Session::has('carrito') ? Session::get('carrito')->totalPrice : 0 }} </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ route('cliente.checkout') }}"
                        class="ml-auto btn hvr-hover">Comprar</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
