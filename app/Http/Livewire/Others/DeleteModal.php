<?php

namespace App\Http\Livewire\Others;

use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class DeleteModal extends ModalComponent
{
    public $title = "", $name = "", $value = "", $table = "", $column = "", $component = "", $method = "";

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function deleteData($table, $column, $value)
    {
        try {
            DB::delete('delete from ' . $table . ' where ' . $column . '= ?', [$value]);
            $this->emit('refreshComponent');
            $this->closeModal();
        } catch (\Exception $e) {
            dd(DB::delete('delete from ' . $table . ' where ' . $column . '= ?', [$value]));
        }
    }

    public function render()
    {
        return view('livewire.others.delete-modal');
    }
}