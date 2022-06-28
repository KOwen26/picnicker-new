<?php

namespace App\Http\Livewire\Cities;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Cities;
use Illuminate\Database\Eloquent\Builder;

class CitiesTable extends DataTableComponent
{
    // protected $model = Cities::class;
    public function builder(): Builder
    {
        return Cities::query()
            ->with('provinces')
            ->orderBy('city_name', 'asc'); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('city_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function columns(): array
    {
        return [
            Column::make("Province Name", "provinces.province_name")
                ->sortable()->searchable(),
            Column::make("City Name", "city_name")
                ->sortable()->searchable(),
        ];
    }
}