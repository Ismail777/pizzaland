<?php

namespace App\Http\Livewire;

use App\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Categories extends Component
{
    public $name;
    public $slug;
    public $newName;

    /**
     * @param $field
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:3',
        ]);

        $this->slug = Str::kebab($this->name);
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required | unique:categories',
        ]);


        Category::create([
            'name'=> $this->name,
            'slug' => $this->slug
        ]);

        session()->flash('message','Success, Category has been added');
    }

    /**
     *
     */
    public function updateCategory()
    {
        Category::update([
            'name' => $this->newName,
            'slug' => $this->slug
        ]);
        session()->flash('message','Success, Category has been updated');
    }

    public function render()
    {
        return view('livewire.categories',
            ['categories' =>Category::all()]);
    }
}
