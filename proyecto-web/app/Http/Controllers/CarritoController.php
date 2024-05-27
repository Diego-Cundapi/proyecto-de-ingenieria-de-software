<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index(){

        $cartItems = Cart::content();
        return view('carrito.index', compact('cartItems'));
    }

    public function agregarProducto(Request $request){

        $producto = Producto::find($request->producto_id);
        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'qty' => 1,
            'weight' => 1,
            'price' => $producto->precio,
            'options' => [
                'imagen' => $producto->imagen
            ]
        ]);
        return redirect()->route('carrito.index')->with("success","$producto->nombre !Se ha agregado correctamente");
    }

    public function incrementarProducto(Request $request){
        $item = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty" => $item->qty+1]);
        return redirect()->route('carrito.index');
    }

    public function decrementarProducto(Request $request){
        $item = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty" => $item->qty-1]);
        return redirect()->route('carrito.index');
    }

    public function eliminarItem(Request $request){
        Cart::remove($request->id);

        if(Cart::count($request->id)==0){
            return redirect()->route('index')->with('success','Carrito Vacio');
        }
        return redirect()->route('carrito.index')->with('success','Producto eliminado correctamente');
    }
    public function eliminarCarrito(){
        Cart::destroy();
        return redirect()->route('index')->with('success','Carrito Vacio');
    }
}
