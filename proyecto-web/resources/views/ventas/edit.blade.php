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
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="fs-4">Pedido N°: {{$pedido->id}} {{strtoupper($pedido->estado)}}</h1>
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route'=>['ventas.update', $pedido], 'method'=>'PUT']) !!}
                    <div class="row">
                        <div class="col-6">
                            {!! Form::select('estado', ["nuevo"=>"Nuevo", "proceso"=>"Proceso", "entregado"=>"Entregado"], $pedido->estado, ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="col-6">
                            {!! Form::submit('ACTUALIZAR', ['class'=>'btn btn-success w-100']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="card-body">
            <li class="list-group-item">Cliente: {{$pedido->user->name}}</li>
            <li class="list-group-item">Teléfono: {{$pedido->user->telefono}}</li>
            <li class="list-group-item">Email: {{$pedido->user->email}}</li>
            <li class="list-group-item">Estado: {{$pedido->user->estado}}</li>
            <li class="list-group-item">Ciudad: {{$pedido->user->ciudad}}</li>
            <li class="list-group-item">Dirección: {{$pedido->user->direccion}}</li>
            <li class="list-group-item">Código Postal: {{$pedido->user->codigo_postal}}</li>
            <li class="list-group-item">Fecha Pedido: {{$pedido->fechapedido}}</li>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedido->detalles as $item)
                    <tr>
                        <td>{{$item->producto->nombre}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->precio}}</td>
                        <td>{{$item->importe}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay detalles del pedido</td>
                    </tr>
                @endforelse

                <tr><td colspan="3" class="text-end">SubTotal: </td>
                    <td>{{$pedido->subtotal}}</td>
                </tr>
                <tr><td colspan="3" class="text-end">Impuesto: </td>
                    <td>{{$pedido->impuesto}}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th>{{$pedido->total}}</th>
                </tr>
            </tfoot>
        </table>
        <a href="javascript:history.go(-1)" class="btn btn-outline-primary">Regresar</a>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
