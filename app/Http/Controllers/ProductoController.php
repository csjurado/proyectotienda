<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    //
    // public function saveproduct(Request $request)
    // {
    //     $request->validate([
    //         'producto_nombre' => ['required', 'unique:productos', 'min:5', 'max:50'],
    //         'producto_precio' => ['required','decimal:2'],
    //         'producto_categoria' => ['required', 'min:5', 'max:50'],
    //         'producto_imagen' => ['required', 'image', 'mimes:jpg,bmp,png'],
    //     ]);
    //     $fileNameWithExt = $request->file('producto_imagen')->getClientOriginalName();
    //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //     $ext = $request->file('producto_imagen')->getClientOriginalExtension();
    //     $fileNameToStore = $fileName . "_" . time() . "." . $ext;

    //     $path = $request->file('producto_imagen')->storeAs('public/productosimagenes', $fileNameToStore);
    //     $producto = new Producto();
    //     $producto->producto_nombre = $request->input('producto_nombre');
    //     $producto->producto_precio = $request->input('producto_precio');
    //     $producto->producto_categoria = $request->input('producto_categoria');
    //     $producto->producto_imagen = $fileNameToStore;
    //     $producto->save();
    //     return redirect()->route('administrador.productos')->with('status', 'Producto Añadido Exitosamente!');
    // }
    public function saveproduct(Request $request)
    {
        $request->validate([
            'producto_nombre' => ['required', 'unique:productos', 'min:5', 'max:50'],
            'producto_precio' => ['required', 'decimal:2'],
            'producto_categoria' => ['required', 'min:5', 'max:50'],
            'producto_imagen' => ['required', 'image', 'mimes:jpg,bmp,png'],
        ]);
        $image = $request->file('producto_imagen');
        $result = Cloudinary::upload($image->getRealPath(), ['folder' => 'productos']);
        $url = $result->getSecurePath();
        $producto = new Producto();
        $producto->producto_nombre = $request->input('producto_nombre');
        $producto->producto_precio = $request->input('producto_precio');
        $producto->producto_categoria = $request->input('producto_categoria');
        $producto->producto_imagen = $url;
        $producto->save();
        return redirect()->route('administrador.productos')->with('status', 'Producto Añadido Exitosamente!');
    }
    public function deleteproduct($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('administrador.productos')->with('status', 'Producto Eliminado con Exito!');
    }
    public function editproduct($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::where("categoria_nombre", '!=', $producto->producto_categoria)->get();
        return view('admin.editproduct', compact('producto', 'categorias'));
    }
    public function updateproduct($id, Request $request)
    {
        $request->validate([
            'producto_nombre' => ['required', 'min:5', 'max:50'],
            'producto_precio' => ['required', 'decimal:2'],
            'producto_categoria' => ['required', 'min:5', 'max:50'],
        ]);
        $producto = Producto::findOrFail($id);
        $producto->producto_nombre = $request->input('producto_nombre');
        $producto->producto_precio = $request->input('producto_precio');
        $producto->producto_categoria = $request->input('producto_categoria');
        if ($request->file('producto_imagen')) {
            $request->validate([
                'producto_imagen' => ['nullable', 'image', 'mimes:jpg,bmp,png'],
            ]);
            $image = $request->file('producto_imagen');
            $result = Cloudinary::upload($image->getRealPath(), ['folder' => 'productos']);
            $url = $result->getSecurePath();
            $producto->producto_imagen = $url;
        }
        $producto->update();
        return redirect()->route('administrador.productos')->with('status', 'Producto Actualizado con Exito!');
    }
    public function desactivateproduct($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 0;
        $producto->update();
        return back();
    }

    public function activarproduct($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 1;
        $producto->update();
        return back();
    }
}
