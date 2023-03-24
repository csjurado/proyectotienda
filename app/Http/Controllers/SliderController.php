<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function guardarslider(Request $request)
    {
        $request->validate([
            'descripcion1' => ['required', 'unique:sliders', 'min:15', 'max:255'],
            'descripcion2' => ['required', 'unique:sliders', 'min:15', 'max:255'],
            'imagen_slider' => ['required', 'image', 'mimes:jpg,bmp,png'],
        ]);
        $fileNameWithExt = $request->file('imagen_slider')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('imagen_slider')->getClientOriginalExtension();
        $fileNameToStore = $fileName . "_" . time() . "." . $ext;

        $path = $request->file('imagen_slider')->storeAs('public/sliderimagenes', $fileNameToStore);
        $slider = new Slider();
        $slider->descripcion1 = $request->input('descripcion1');
        $slider->descripcion2 = $request->input('descripcion2');
        $slider->imagen_slider = $fileNameToStore;
        $slider->save();
        return redirect()->route('administrador.sliders')->with('status', 'Slider Añadido Exitosamente!');
    }
    public function deleteslider($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete("public/sliderimagenes/$slider->imagen_slider");
        $slider->delete();
        return redirect()->route('administrador.sliders')->with('status', 'Slider Eliminado con Exito!');
    }
    public function editslider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.editslider', compact('slider'));
    }
    public function updateslider($id, Request $request)
    {
        $request->validate([
            'descripcion1' => ['required', 'min:15', 'max:255'],
            'descripcion2' => ['required', 'min:15', 'max:255'],
        ]);
        $slider = Slider::findOrFail($id);
        $slider->descripcion1 = $request->input('descripcion1');
        $slider->descripcion2 = $request->input('descripcion2');
        if ($request->file('imagen_slider')) {
            $request->validate([
                'imagen_slider' => ['nullable', 'image', 'mimes:jpg,bmp,png'],
            ]);
            $fileNameWithExt = $request->file('imagen_slider')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('imagen_slider')->getClientOriginalExtension();
            $fileNameToStore = $fileName . "_" . time() . "." . $ext;
            Storage::delete("public/sliderimagenes/$slider->imagen_slider");
            $path = $request->file('imagen_slider')->storeAs('public/sliderimagenes', $fileNameToStore);
            $slider->imagen_slider = $fileNameToStore;
        }
        $slider->update();
        return redirect()->route('administrador.sliders')->with('status', 'Slider Actualizado con Exito!');
    }
    public function desactivateslider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->estado = 0;
        $slider->update();
        return back();
    }

    public function activarslider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->estado = 1;
        $slider->update();
        return back();
    }
}
