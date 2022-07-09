<?php

namespace App\Http\Livewire\Facilities;

use App\Models\Admin\Facilities;
use App\Models\Merchant\MerchantType;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FacilitiesDetails extends ModalComponent
{
    public $facility, $facility_id, $facility_name, $merchant_type_id, $facility_icon, $facility_description, $facility_status = true;

    public function mount($id = null)
    {
        if ($id) {
            $this->facility = Facilities::find($id);
            $this->facility_id = $this->facility->facility_id;
            $this->facility_name = $this->facility->facility_name;
            $this->merchant_type_id = $this->facility->merchant_type_id;
            $this->facility_icon = $this->facility->facility_icon;
            $this->facility_description = $this->facility->facility_description;
            $this->facility_status = $this->facility->facility_status == 'ACTIVE' ? true : false;
        }
    }

    public function resetInput()
    {
        $this->facility_id = null;
        $this->facility_name = null;
        $this->merchant_type_id = null;
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
            'merchant_type_id' => $this->merchant_type_id,
            'facility_icon' => $this->facility_icon ?? null,
            'facility_description' => $this->facility_description ?? null,
            'facility_status' => 'ACTIVE'
        ]);

        $this->resetInput();
        $this->emitTo('facilities.facilities-table', 'refreshComponent');
        $this->closeModal();
    }

    public function update()
    {
        // dd($this->facility, $this->facility_status, $this->facility->facility_status !== true ? 'DISABLED' : 'ACTIVE');
        $facility = Facilities::find($this->facility_id);
        $facility->facility_name = $this->facility_name;
        $facility->merchant_type_id = $this->merchant_type_id;
        $facility->facility_icon = $this->facility_icon ?? null;
        $facility->facility_description = $this->facility_description ?? null;
        $facility->facility_status = $this->facility->facility_status !== true ? 'DISABLED' : 'ACTIVE';
        $facility->save();

        $this->resetInput();
        $this->emitTo('facilities.facilities-table', 'refreshComponent');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.facilities.facilities-details', ['merchant_types' => MerchantType::all()]);
    }
}