<?php

namespace App\Http\Livewire\Others;

use Livewire\Component;

class Sidebar extends Component
{

    public $group_list, $menu_list;

    public function mount($group_list = [], $menu_list = [])
    {
        $this->group_list = collect($group_list);
        $this->menu_list = collect($menu_list);
    }

    public function render()
    {
        return view('livewire.others.sidebar');
    }
}