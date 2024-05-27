@extends('productos._templateForm')

@section('content')
<div class="container mx-auto  py-8">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-4xl text-center text-white font-semibold mb-6">Carrito de Compras</h1>

    <div class="flex justify-center">
        <table class="table table-striped w-3/5 rounded bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Producto</th>
                    <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                    <th class="py-2 px-4 border-b border-gray-300">Precio</th>
                    <th class="py-2 px-4 border-b border-gray-300">Cantidad</th>
                    <th class="py-2 px-4 border-b border-gray-300">Importe</th>
                    <th class="py-2 px-4 border-b border-gray-300">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach(Cart::content() as $item)
                    <tr class="">
                        <td class="py-2 px-4 border-b border-gray-300">
                            <img src="{{asset($item->options->imagen)}}" alt="Imagen del producto" class="mx-auto w-16 h-16 object-cover">
                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">${{ $item->price }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Small button group">
                                <a href="{{route('carrito.decrementarproducto',$item->rowId)}}" class="bg-red-500 text-white rounded-l px-2 py-1 hover:bg-red-700">-</a>
                                <button type="button" class="btn">{{$item->qty}}</button>
                                <a href="{{route('carrito.incrementarproducto',$item->rowId)}}" class="bg-green-500 text-white rounded-r px-2 py-1 hover:bg-green-700">+</a>
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">${{ number_format($item->qty * $item->price,2) }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="{{route('carrito.eliminaritem',$item->rowId)}}" class="py-2 px-4 bg-red-500 rounded-md hover:text-white hover:bg-red-900">Remover</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end font-bold py-2 px-4">Subtotal:</td>
                    <td class="text-center py-2 px-4">${{Cart::subtotal()}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end font-bold py-2 px-4">Impuesto:</td>
                    <td class="text-center py-2 px-4">${{Cart::tax()}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end font-bold py-2 px-4">Total:</td>
                    <td class="text-center py-2 px-4">${{Cart::total()}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center mt-5 mb-5 text-center">
        <a href="{{ route('index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Seguir Comprando</a>
        @auth
            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Realizar compra</a>
        @endauth
        <a href="{{ route('carrito.eliminarcarrito') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Limpiar carrito</a>
    </div>
</div>
@endsection
