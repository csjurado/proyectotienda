<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{

    public function seeorders($id){

        Session::put('id', $id);

        try{
            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->covert_orders_data_to_html());

            return $pdf->stream();
        }
        catch(Exception $e){
            return redirect()->route('administrador.ordenes')->with('error', $e->getMessage());
        }

    }
    public function covert_orders_data_to_html()
    {
        $ordenes = Orden::where('id', Session::get('id'))->get();
        foreach ($ordenes as $orden) {
            $nombres = $orden->nombres;
            $direccion = $orden->direccion;
            $fecha = $orden->created_at;
        }
        $ordenes->transform(function ($orden, $key) {
            $orden->carrito = unserialize(($orden->carrito));
            return $orden;
        });

        $output = '<link rel="stylesheet" href="frontend/css/style1.css">
            <table class="table">
                <thead class="thead">
                    <tr class="text-left">
                        <th>Nombre del Cliente : ' . $nombres . '<br> Dirección : ' . $direccion . ' <br> Fecha : ' . $fecha . '</th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead class="thead-primary">
                    <tr class="text-center">
                        <th>Imagen</th>
                        <th>Nombre del Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($ordenes as $orden) {

            foreach ($orden->carrito->items as $item) {

                $output .= '<tr class="text-center">
                                    <td class="image-prod"><img src="storage/productosimagenes/' . $item['producto_imagen'] . '" alt="" style = "height: 80px; width: 80px;"></td>
                                    <td class="product-name">
                                        <h3>' . $item['producto_nombre'] . '</h3>
                                    </td>
                                    <td class="price">$ ' . $item['producto_precio'] . '</td>
                                    <td class="qty">' . $item['qty'] . '</td>
                                    <td class="total">$ ' . $item['producto_precio'] * $item['qty'] . '</td>
                                </tr><!-- END TR-->
                                </tbody>';
            }

            $totalPrice = $orden->carrito->totalPrice;
        }
        $output .= '</table>';

        $output .= '<table class="table">
                            <thead class="thead">
                                <tr class="text-center">
                                        <th>Total</th>
                                        <th>$ ' . $totalPrice . '</th>
                                </tr>
                            </thead>
                        </table>';


        return $output;
    }
}
