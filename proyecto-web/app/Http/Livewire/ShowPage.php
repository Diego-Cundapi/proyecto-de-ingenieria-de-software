<?php 
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categories;
use App\Models\Producto;

class ShowPage extends Component
{
    use WithPagination;

    public $category = '';
    public $search = '';
    public $producto;

    public function mount($producto = null)
    {
        if ($producto) {
            $this->producto = Producto::find($producto);
        }
    }

    public function filterByCategory($category)
    {
        $this->category = $category;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        if ($this->producto) {
            return view('livewire.mostrar', ['productoMostrar' => $this->producto]);
        }

        $categories = Categories::orderBy('name', 'asc')->get();

        $productos = Producto::query();

        if ($this->search) {
            $productos->where('nombre', 'like', "%{$this->search}%");
        }

        if ($this->category) {
            $productos->where('categories_id', $this->category);
        }

        $productos = $productos->with('categoria')->latest()->paginate(12);

        return view('livewire.show-page', [
            'categories' => $categories,
            'productos' => $productos
        ]);
    }
}
