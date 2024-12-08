<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User; // Añadir esta línea
use App\Models\Pedido; // Añadir esta línea

class Clientes extends Component
{
    public $clientes;

    public function mount()
    {
        $this->clientes = User::role('cliente')->with(['pedidos' => function($query) {
            $query->latest();
        }])->get();
    }
    
    public function render()
    {
        return view('livewire.clientes', [
            'clientes' => $this->clientes->map(function($cliente) {
                return [
                    'name' => $cliente->name,
                    'email' => $cliente->email,
                    'telefono' => $cliente->telefono,
                    'direccion' => $cliente->direccion,
                    'ultima_compra' => $cliente->pedidos->first()->fechapedido ?? 'N/A',
                ];
            }),
        ]);
    }
}
