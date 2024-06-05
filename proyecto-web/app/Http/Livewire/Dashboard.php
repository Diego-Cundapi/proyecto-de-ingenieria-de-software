<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $productos = Producto::orderByDesc('updated_at')->with('categoria')->get();
        return view('livewire.dashboard',['productos' => $productos]);
    }
}
