<?php

namespace App\Http\Livewire\Customers;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer\Customers;

class CustomersTable extends DataTableComponent
{
    protected $model = Customers::class;

    public function configure(): void
    {
        $this->setPrimaryKey('customer_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function columns(): array
    {
        return [
            Column::make("Customer Id", "customer_id")
                ->sortable()->searchable(),
            Column::make("Name", "customer_name")
                ->sortable()->searchable(),
            Column::make("Email", "customer_email")
                ->sortable()->searchable(),
            Column::make("Phone", "customer_phone")
                ->sortable()->searchable(),
            Column::make("Join Date", "created_at")
                ->sortable(),
            Column::make("Status", "customer_status")
                ->format(fn ($value) => view('components.status-badges', ['value' => $value, 'type' => 'regular']))
                ->sortable()->excludeFromColumnSelect(),
            Column::make("Action", "customer_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Pelanggan', 'name' => $row->customer_name, 'update_modal' => 'customers.customers-details', 'deleteModel' => 'customers.customers-table', 'deleteMethod' => 'customerDelete']))->excludeFromColumnSelect(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}