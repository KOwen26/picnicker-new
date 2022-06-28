<?php

namespace App\Http\Livewire\Banks;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Banks;
use Illuminate\Database\Eloquent\Builder;

class BanksTable extends DataTableComponent
{
    // protected $model = Banks::class;

    public function builder(): Builder
    {
        return Banks::query()
            ->orderBy('bank_name', 'asc'); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('bank_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function columns(): array
    {
        return [
            Column::make("Bank Name", "bank_name")
                ->sortable()->searchable(),
            Column::make("Bank Code", "bank_code")
                ->sortable()->searchable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}