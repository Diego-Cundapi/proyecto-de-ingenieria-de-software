<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;;

class ShowPage extends Component
{
    public function render()
    {  
        $categories = Categories::get();
        return view('livewire.show-page',
        [
            'categories' => $categories
        ]);
    }
}
