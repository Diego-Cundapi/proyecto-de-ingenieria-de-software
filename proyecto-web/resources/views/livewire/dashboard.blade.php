<div>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Panel de administración</h1>
    @stop

    @section('content')
    <div class="flex justify-end">
        <div class="inline-block text-white bg-green-600 rounded-lg px-4 py-2 mx-2">
            <a href="#" class="text-white">Nuevo Producto</a>
        </div>
    </div>

        <div class="px-2 py-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border border-slate-400 px-4 py-2">Categoría</th>
                        <th class="border border-slate-400 px-4 py-2">Nombre</th>
                        <th class="border border-slate-400 px-4 py-2">Modelo</th>
                        <th class="border border-slate-400 px-4 py-2">Marca</th>
                        <th class="border border-slate-400 px-4 py-2">Precio</th>
                        <th class="border border-slate-400 px-4 py-2">Clave</th>
                        <th class="border border-slate-400 px-4 py-2">Descripción</th>
                        <th class="border border-slate-400 px-4 py-2">Imagen</th>
                        <th class="border border-slate-400 px-4 py-2">Disponible</th>
                        <th class="border border-slate-400 px-4 py-2">Acciones</th>
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
                            <td class="border border-slate-400 px-4 py-2">
                                <img src="{{ $producto->imagen }}" alt="Imagen" class="w-32 h-24 object-cover">
                            </td>
                            <td class="border border-slate-400 px-4 py-2">{{ $producto->disponible }}</td>
                            <td class="border border-slate-400 px-4 py-2">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
        <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    @stop
</div>
