<div>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1 class="">Lista de clientes</h1>
    @stop

    @section('content')
        <div>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Nombre</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Teléfono</th>
                        <th class="py-2">Dirección</th>
                        <th class="py-2">Última Compra</th>
                        <th class="py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td class="border px-4 py-2">{{ $cliente->name }}</td>
                            <td class="border px-4 py-2">{{ $cliente->email }}</td>
                            <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                            <td class="border px-4 py-2">{{ $cliente->direccion }}</td>
                            <td class="border px-4 py-2">{{ $cliente->ultima_compra }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('ventas.edit', $cliente->id) }}" class="btn btn-primary">Ver Última Compra</a>
                            </td>
                        </tr>
                    @endforeach
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
    @stop
</div>
