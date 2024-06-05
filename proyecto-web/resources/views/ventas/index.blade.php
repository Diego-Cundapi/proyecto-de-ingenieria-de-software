@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de Ventas</h1>
@stop

@section('content')

@if(session('success'))
    <div class="bg-green-200 text-green-700 py-2 px-4 rounded-md mb-4 flex justify-center">
        {{ session('success') }}
    </div>
@endif
<div class="col-sm-8">
    <h1 class="mt-3 mb-3 fs-4">Seccion de Ventas</h1>
    <table class="table table-bordered w-full">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha Pedido</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
        @forelse($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->user->name}}</td>
                <td>{{$pedido->fechapedido}}</td>
                <td>{{$pedido->total}}</td>
                <td>{{$pedido->estado}}</td>
                <td>
                    <a href="{{route('ventas.edit',$pedido->id)}}" class="btn btn-success">Ver Detalle</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No hay ventas</td>
            </tr>
        @endforelse
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
