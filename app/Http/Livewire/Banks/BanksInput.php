<?php

namespace App\Http\Livewire\Banks;

use App\Models\Admin\Banks;
use Livewire\Component;

class BanksInput extends Component
{
    public $bank_id;
    public $model = 'bank_id';
    public $attributes = [];
    public $class = null;

    public function mount($attributes = [], $class = null, $model = 'bank_id')
    {
        $this->attributes = $attributes;
        $this->class = $class;
        $this->model = $model;
    }


    public function render(Banks $banks)
    {
        return view('livewire.banks.banks-input', ['banks' => $banks::orderBy('bank_name', 'asc')->get()]);
    }
}