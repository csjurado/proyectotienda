<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function savecategory(Request $request)
    {
        $request->validate([
            'categoria_nombre' => ['required', 'unique:categorias', 'min:4', 'max:50']
        ]);
        $categoria = new Categoria();
        $categoria->categoria_nombre = $request->input('categoria_nombre');
        $categoria->save();
        return redirect()->route('administrador.categorias')->with('status', 'Categoría añadida Extosamente!');
    }
    public function deletecategory($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('administrador.categorias')->with('status', 'Categoría Eliminada con Exito!');
    }
    public function editcategory($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.editcategory', compact('categoria'));
        // return view('admin.editcategory')->with('categoria', $categoria);
    }
    public function updatecategory($id, Request $request)
    {
        $request->validate([
            'categoria_nombre' => ['required', 'unique:categorias', 'min:4', 'max:50']
        ]);
        $categoria =  Categoria::findOrFail($id);
        $categoria->categoria_nombre = $request->input('categoria_nombre');
        $categoria->update();
        return redirect()->route('administrador.categorias')->with('status', 'Categoría Editada con Exito! ');
    }
}
