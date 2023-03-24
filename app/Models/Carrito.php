<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item)
    {
        $storedItem = [
            'qty' => 0,
            'producto_id' => 0,
            'producto_nombre' => $item->producto_nombre,
            'producto_precio' => $item->producto_precio,
            'producto_imagen' => $item->producto_imagen,
            'item' => $item
        ];
        if ($this->items) {
            if (array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }
        $storedItem['qty']++;
        $storedItem['producto_id'] = $item->id;
        $storedItem['producto_nombre'] = $item->producto_nombre;
        $storedItem['producto_precio'] = $item->producto_precio;
        $storedItem['producto_imagen'] = $item->producto_imagen;
        $this->totalQty++;
        $this->totalPrice += $item->producto_precio;
        $this->items[$item->id] = $storedItem;
    }
    public function updateQty($id, $qty)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['producto_precio'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['producto_precio'] * $qty;
    }
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['producto_precio'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}
