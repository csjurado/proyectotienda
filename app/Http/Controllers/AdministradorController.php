<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\Slider;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdministradorController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function category()
    {
        $categorias = Categoria::get();
        // return view('admin.categories')->with('categorias', $categorias);
        return view('admin.categories', compact('categorias'));
    }
    public function addslider()
    {
        return view('admin.addslider');
    }
    public function sliders()
    {
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    public function addproduct()
    {
        $categorias = Categoria::get();
        return view('admin.addproduct', compact('categorias'));
    }
    public function products()
    {
        $productos = Producto::get();
        return view('admin.products', compact('productos'));
    }
    public function orders()
    {
        $ordenes = Orden::all();
        $ordenes->transform(function ($orden, $key) {
            $orden->carrito = unserialize(($orden->carrito));
            return $orden;
        });
        return view('admin.orders', compact('ordenes'));
    }
}
