<?php

namespace App\Http\Livewire\Facilities;

use App\Models\Admin\Facilities;
use Livewire\Component;

class FacilitiesInput extends Component
{
    public $attributes = [];
    public $class = null;
    public $facility_id = [];

    public function mount($attributes = [], $class = null)
    {
        $this->attributes = $attributes;
        $this->class = $class;
    }

    public function check()
    {
        dd($this->facility_id);
    }

    public function render(Facilities $facilities)
    {
        return view('livewire.facilities.facilities-input', ['facilities' => $facilities::orderBy('facility_name', 'asc')->get()]);
    }
}