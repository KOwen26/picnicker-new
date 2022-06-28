<?php

namespace App\Http\Livewire\Others;

use Livewire\Component;

class Navbar extends Component
{

    public $name;
    public $menu_list;

    public function mount($name = null, $menu_list = null)
    {
        $this->name = $name;
        $this->menu_list = collect($menu_list);
    }

    public function render()
    {
        return view('livewire.others.navbar');
    }
}