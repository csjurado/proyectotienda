<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;

class ClienteController extends Controller
{
    //
    public function home()
    {
        $sliders = Slider::get();
        $productos = Producto::get();
        return view('clientes.inicio', compact('sliders', 'productos'));
    }
    public function shop()
    {
        $productos = Producto::get();
        return view('clientes.shop', compact('productos'));
    }
    public function cart()
    {
        return view('clientes.carro');
    }
    public function checkout()
    {
        if (Session::has('cliente')) {
            return view('clientes.checkout');
        }
        return redirect()->route('cliente.inicarsesion');
    }
    public function register()
    {
        return view('clientes.registrar');
    }
    public function signin()
    {
        return view('clientes.signin');
    }
    public function createcount(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:clientes',
            'password' => 'required|min:6',
        ]);
        $cliente = new Cliente();
        $cliente->email = $request->input('email');
        $cliente->password = bcrypt($request->input('password'));

        $cliente->save();
        return back()->with('status', 'Tu cuenta ha sido creada Exisotsamente!');
    }
    public function accessaccount(Request $request)
    {
        $cliente = Cliente::where('email', $request->input('email'))->first();
        if ($cliente) {
            if (Hash::check($request->input('password'), $cliente->password)) {
                Session::put('cliente', $cliente);
                return redirect('/checkout');
            }
            return back()->with('error', 'Email o Contraseña Incorrectos!');
        }
        return back()->with('error', 'No existe una cuenta con este Email');
    }
    public function logout()
    {
        Session::forget('cliente');
        return back();
    }
    public function addtocart($id)
    {
        $producto = Producto::findOrFail($id);
        $oldCart = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCart);
        $carrito->add($producto);
        Session::put('carrito', $carrito);
        Session::put('topCart', $carrito->items);
        return back();
    }
    public function updateqty(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $oldCart = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCart);
        $carrito->updateQty($id, $request->qty);
        Session::put('carrito', $carrito);
        Session::put('topCart', $carrito->items);
        return back();
    }
    public function removeproduct($id)
    {
        $producto = Producto::findOrFail($id);
        $oldCart = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCart);
        $carrito->removeItem($id);
        Session::put('carrito', $carrito);
        Session::put('topCart', $carrito->items);
        return back();
    }
    public function orderproduct(Request $request)
    {
        // try {

        //     $orden = new Orden();
        //     $oldCart = Session::has('carrito') ? Session::get('carrito') : null;
        //     $carrito = new Carrito($oldCart);

        //     $orden->nombres = $request->input('nombre') . ' ' . $request->input('apellido');
        //     $orden->direccion = $request->input('direccion');
        //     $orden->carrito = serialize($carrito);

        //     Session::put('orden', $orden);

        //     $checkoutData = $this->checkoutData();

        //     $provider = new PayPal();

        //     $response = $provider->checkoutData($checkoutData);

        //     return redirect($response['paypal_link']);
        // } catch (\Exception $e) {
        //     return redirect()->route('cliente.carro')->with('status', $e->getMessage());
        // }

        Session::forget('carrito');
        Session::forget('topCart');
        // return redirect()->route('cliente.carro')->with('status', 'Tu orden ha sido generada exitosamente!');
        return redirect()->route('pagopaypal')->with('status', 'Tu orden ha sido generada exitosamente!');
    }

    private function checkoutData(){

        $oldCart = Session::has('carrito')? Session::get('carrito'):null;
        $carrito = new Carrito($oldCart);

        $data['items'] = [];

        foreach($carrito->items as $item ){
                $itemDetails=[
                'producto_nombre' => $item['producto_nombre'],
                'producto_precio' => $item['producto_precio'],
                'qty' => $item['qty']
                ];

            $data['items'][] = $itemDetails;            
        }

        $checkoutData = [
            'items' => $data['items'],
            'return_url' => redirect()->route('pagoexitoso'),
            'cancel_url' => redirect()->route('cliente.carro'),
            'invoice_id' => uniqid(),
            'invoice_description' => "order description",
            'total' => Session::get('carrito')->totalPrice
        ];

        return $checkoutData;
    }
}
