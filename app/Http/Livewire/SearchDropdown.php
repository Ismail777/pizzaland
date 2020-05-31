<?php

namespace App\Http\Livewire;

use App\Item;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = ''; //user input
    


    public function render()
    {
        $searchResults = [];
        $searchTerm = '%'. $this->search . '%';

        if (strlen($this->search) > 2) {

            $searchResults = Item::where('title', 'like',$searchTerm)->get();
        }

        

            return view('livewire.search-dropdown', [
                'searchResults' => $searchResults
            ]);
        
    }
}
