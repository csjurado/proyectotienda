<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//Cliente Administrador


Route::get('/', [ClienteController::class, 'home'])->name('cliente.inicio');
Route::get('/tienda', [ClienteController::class, 'shop'])->name('cliente.shop');
Route::get('/carrito', [ClienteController::class, 'cart'])->name('cliente.carro');
Route::get('/checkout', [ClienteController::class, 'checkout'])->name('cliente.checkout');
Route::get('/registrar', [ClienteController::class, 'register'])->name('cliente.registrar');
Route::get('/iniciarsesion', [ClienteController::class, 'signin'])->name('cliente.inicarsesion');
Route::get('/logout', [ClienteController::class, 'logout'])->name('logout');
Route::get('/añadiralcarrito/{id}', [ClienteController::class, 'addtocart'])->name('cliente.añadiralcarrito');
Route::put('/carrito/actualizarqty/{id}', [ClienteController::class, 'updateqty'])->name('cliente.actualizarcarrito');
Route::get('/carrito/borrar/{id}', [ClienteController::class, 'removeproduct'])->name('cliente.removerdelcarrito');
Route::post('/crearcuenta', [ClienteController::class, 'createcount'])->name('crearcuenta');
Route::post('/accedercuenta', [ClienteController::class, 'accessaccount'])->name('accedercuenta');
Route::post('/ordendelproducto', [ClienteController::class, 'orderproduct'])->name('ordendelproducto');

//controadlores de PayPal
Route::get('/pagopaypal', [PayPalController::class, 'pagopaypal'])->name('pagopaypal');
Route::post('/request-payment', [PayPalController::class, 'RequestPayment'])->name('requestpayment');
Route::get('/payment-success', [PayPalController::class, 'PaymentSuccess'])->name('paymentsuccess');
Route::get('/payment-cancel', [PayPalController::class, 'PaymentCancel'])->name('paymentCancel');


//Administrador Controladores 
Route::get('/administrador', [AdministradorController::class, 'dashboard'])->name('administrador.dashboard');
Route::get('/administrador/añadircategoria', [AdministradorController::class, 'addcategory'])->name('administrador.añadircategoria');
Route::get('/administrador/categorias', [AdministradorController::class, 'category'])->name('administrador.categorias');
Route::get('/administrador/añadirslider', [AdministradorController::class, 'addslider'])->name('administrador.añadirslider');
Route::get('/administrador/sliders', [AdministradorController::class, 'sliders'])->name('administrador.sliders');
Route::get('/administrador/añadirproducto', [AdministradorController::class, 'addproduct'])->name('administrador.añadirproducto');
Route::get('/administrador/productos', [AdministradorController::class, 'products'])->name('administrador.productos');
Route::get('/administrador/ordenes', [AdministradorController::class, 'orders'])->name('administrador.ordenes');

//Categia Controladores 
Route::post('/administrador/guardarcategoria', [CategoriaController::class, 'savecategory'])->name('guardarcategoria');
Route::delete('/administrador/borrarcategoria/{id}', [CategoriaController::class, 'deletecategory'])->name('borrarcategoria');
Route::get('/administrador/editarcategoria/{id}', [CategoriaController::class, 'editcategory'])->name('editarcategoria');
Route::patch('/administrador/actualizarcategoria/{id}', [CategoriaController::class, 'updatecategory'])->name('actualizarcategoria');

//Sliders Controladores
Route::post('/administrador/guardarslider', [SliderController::class, 'guardarslider'])->name('guardarslider');
Route::delete('/administrador/borrarslider/{id}', [SliderController::class, 'deleteslider'])->name('borrarslider');
Route::get('/administrador/editarslider/{id}', [SliderController::class, 'editslider'])->name('editarslider');
Route::patch('/administrador/actualizarslider/{id}', [SliderController::class, 'updateslider'])->name('actualizarslider');
Route::put('/administrador/desactivarslider/{id}', [SliderController::class, 'desactivateslider'])->name('desactivarslider');
Route::put('/administrador/activarslider/{id}', [SliderController::class, 'activarslider'])->name('activarslider');

//Productos Controladores 
Route::post('/administrador/guardarproducto', [ProductoController::class, 'saveproduct'])->name('guardarproducto');
Route::delete('/administrador/borrarproducto/{id}', [ProductoController::class, 'deleteproduct'])->name('borrarproducto');
Route::get('/administrador/editarproducto/{id}', [ProductoController::class, 'editproduct'])->name('editarproducto');
Route::patch('/administrador/actualizarproducto/{id}', [ProductoController::class, 'updateproduct'])->name('actualizarproducto');
Route::put('/administrador/desactivarproducto/{id}', [ProductoController::class, 'desactivateproduct'])->name('desactivarproducto');
Route::put('/administrador/activarproducto/{id}', [ProductoController::class, 'activarproduct'])->name('activarproducto');

//PDF Controladores
Route::get('/verorden/{id}', [PdfController::class, 'seeorders'])->name('verorden');
