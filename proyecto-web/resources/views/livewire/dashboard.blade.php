<div>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1 class="">Panel de inventario</h1>
    @stop

    @section('content')

    @if(session('success'))
        <div class="bg-green-200 text-green-700 py-2 px-4 rounded-md mb-4 flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <div class="flex justify-between">
            <div class="inline-block text-white bg-green-600 rounded-lg px-4 py-2 mx-2 space-x-4 hover:bg-green-800">
                <a href="{{route('categoria.create')}}" class="text-white ">Nueva categoria</a>
            </div>
            <div class="bg-green-600 rounded-lg px-4 py-2 mx-2 hover:bg-green-800">
                <a href="{{route('productos.create')}}" class="text-white  ">Nuevo Producto</a>
            </div>
        </div>

        <div class="px-2 py-2">
            <table class="table">
                <thead>
                <tr> 
                    <th class="border border-slate-400 px-4 py-2 text-center">Categoría</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Nombre</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Modelo</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Marca</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Precio</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Clave</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Descripción</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Imagen</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Disponible</th>
                    <th class="border border-slate-400 px-4 py-2 text-center">Acciones</th>
                </tr>

                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->categoria ? $producto->categoria->name : 'Sin categoría' }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->nombre }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->modelo }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->marca }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->precio }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->clave }}</td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->descripcion }}</td>
                            <td class="border border-slate-400 px-4 py-2 w-32 h-20">
                                <img src="{{ asset($producto->imagen) }}" alt="Imagen">
                            </td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->disponible }}</td>
                            <td class="border border-slate-400 px-4 py-2">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminar?')">Eliminar</button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="border border-slate-400 px-4 py-2 text-center">No hay productos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    @stop

    @section('preloader')
        <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
        <h4 class="mt-4 text-dark">Cargando</h4>
    @stop

    @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
    @stop
</div>
