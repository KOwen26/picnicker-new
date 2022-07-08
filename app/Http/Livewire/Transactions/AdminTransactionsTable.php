<?php

namespace App\Http\Livewire\Transactions;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer\Transactions;

class AdminTransactionsTable extends DataTableComponent
{
    protected $model = Customer\Transactions::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Transaction id", "transaction_id")
                ->sortable(),
            Column::make("Transaction id", "transaction_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
