<?php

namespace App\Http\Livewire\Facilities;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Facilities;
use Illuminate\Database\Eloquent\Builder;

class FacilitiesTable extends DataTableComponent
{
    protected $model = Facilities::class;
    protected $listeners = ['facilityDelete' => 'facilityDelete', 'refreshComponent' => '$refresh'];
    // public function builder(): Builder
    // {
    //     return Facilities::query()
    //         ->orderBy('facility_name', 'asc'); // Select some things
    // }

    public function configure(): void
    {
        $this->setPrimaryKey('facility_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    // public function detailsModal($id)
    // {
    //     return $this->emit('openModal', 'facilities.facilities-details',   ['id' => $id]);
    // }

    // public function deleteModal($id, $name)
    // {
    //     // dd($id, $name);
    //     return $this->emit('openModal', 'others.delete-modal',   ['title' => 'Fasilitas', 'component' => 'facilities.facilities-table', 'method' => 'facilityDelete', 'value' => $id, 'name' => $name]);
    // }

    public function facilityDelete(Facilities $facility)
    {
        $facility->delete();
        $this->emit('closeModal', 'others.delete-modal');
        $this->emit('refreshComponent');
    }

    public function columns(): array
    {
        return [
            // Column::make("Facility id", "facility_id")
            //     ->sortable(),
            Column::make("Facility Name", "facility_name")
                ->sortable()->searchable(),
            Column::make("Facility Type", "facility_type")
                ->sortable()->searchable(),
            // Column::make("Facility Icon", "facility_icon")
            //     ->sortable(),
            Column::make("Facility Description", "facility_description")
                ->sortable()->searchable(),
            Column::make("Action", "facility_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Fasilitas', 'name' => $row->facility_name, 'update_modal' => 'facilities.facilities-details', 'deleteModel' => 'facilities.facilities-table', 'deleteMethod' => 'facilityDelete']))->excludeFromColumnSelect(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}