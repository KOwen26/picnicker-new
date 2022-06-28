<?php

namespace App\Http\Livewire\Provinces;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Provinces;
use Illuminate\Database\Eloquent\Builder;

class ProvincesTable extends DataTableComponent
{
    // protected $model = Provinces::class;

    public function builder(): Builder
    {
        return Provinces::query()
            ->orderBy('province_name', 'asc'); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('province_id');
        $this->setPerPageAccepted([5, 10, 25, 50, 100, -1]);
        $this->setPerPage(5);
    }

    public function columns(): array
    {
        return [
            // Column::make("No", "province_id")
            //     ->sortable(),
            Column::make("Province Name", "province_name")
                ->sortable()->searchable(),

        ];
    }
}