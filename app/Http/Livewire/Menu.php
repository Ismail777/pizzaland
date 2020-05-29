<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public $items;

    public function mount($categories, $items)
    {
        $this->categories = $categories;
        $this->items = $items;
    }

    public function addToCart()
    {

    }


    public function render()
    {
        return view('livewire.menu');
    }
}
