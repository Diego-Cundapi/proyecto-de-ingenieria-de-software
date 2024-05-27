<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function confirmarCarrito(){
        //dd(Cart::subtotal());
        $pedido = new Pedido();
        $pedido->subtotal = floatval(str_replace(',', '', Cart::subtotal()));
        $pedido->impuesto = floatval(str_replace(',', '', Cart::tax()));
        $pedido->total = floatval(str_replace(',', '', Cart::total()));
        $pedido->fechapedido = Carbon::now();
        $pedido->estado = "nuevo"; 
        $pedido->user_id= auth()->user()->id;
        $pedido->save();

        foreach(Cart::content() as $item){
            $detalle = new Detalle();
            $detalle->precio = $item->price;
            $detalle->importe = $item->price * $item->qty;
            $detalle->cantidad = $item->qty;
            $detalle->pedido_id = $pedido->id;
            $detalle->producto_id = $item->id;
            $detalle->save();
        }

        Cart::destroy();
        return redirect()->route('index')->with('success','Pedido realizado correctamente');
    }
}
