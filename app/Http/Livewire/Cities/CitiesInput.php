<?php

namespace App\Http\Livewire\Cities;

use App\Models\Admin\Cities;
use Livewire\Component;

class CitiesInput extends Component
{

    public $attributes = [];
    public $class = null;
    public $model = 'city_id';

    public function mount($attributes = [], $class = null, $model = 'city_id')
    {
        $this->attributes = $attributes;
        $this->class = $class;
        $this->model = $model;
    }

    public function render(Cities $cities)
    {
        return view('livewire.cities.cities-input', ['cities' => $cities::orderBy('city_name', 'asc')->get()]);
    }
}