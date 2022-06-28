<?php

namespace App\Http\Livewire\Facilities;

use App\Models\Admin\Facilities;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FacilitiesDetails extends ModalComponent
{
    public $facility, $facility_id, $facility_name, $facility_type, $facility_icon, $facility_description;

    public function mount($id = null)
    {
        if ($id) {
            $this->facility = Facilities::find($id);
            $this->facility_id = $this->facility->facility_id;
            $this->facility_name = $this->facility->facility_name;
            $this->facility_type = $this->facility->facility_type;
            $this->facility_icon = $this->facility->facility_icon;
            $this->facility_description = $this->facility->facility_description;
        }
    }

    public function resetInput()
    {
        $this->facility_id = null;
        $this->facility_name = null;
        $this->facility_type = null;
        $this->facility_icon = null;
        $this->facility_description = null;
    }

    public function validation()
    {
    }

    public function store()
    {
        Facilities::create([
            'facility_name' => $this->facility_name,
            'facility_type' => $this->facility_type,
            'facility_icon' => $this->facility_icon ?? null,
            'facility_description' => $this->facility_description ?? null,
        ]);

        $this->resetInput();
        $this->emitTo('facilities.facilities-table', 'refreshComponent');
        $this->closeModal();
    }

    public function update()
    {
        $facility = Facilities::find($this->facility_id);
        $facility->facility_name = $this->facility_name;
        $facility->facility_type = $this->facility_type;
        $facility->facility_icon = $this->facility_icon ?? null;
        $facility->facility_description = $this->facility_description ?? null;
        $facility->save();

        $this->resetInput();
        $this->emitTo('facilities.facilities-table', 'refreshComponent');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.facilities.facilities-details');
    }
}