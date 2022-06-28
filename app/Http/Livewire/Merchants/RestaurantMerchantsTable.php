<?php

namespace App\Http\Livewire\Merchants;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Merchant\Merchants;
use Illuminate\Database\Eloquent\Builder;

class RestaurantMerchantsTable extends DataTableComponent
{
    protected $merchant_type_id = 1;
    // protected $model = Merchants::class;
    protected $listeners = [];

    public function builder(): Builder
    {
        return Merchants::query()->where(['merchant_type_id' => $this->merchant_type_id]); // Select some things
    }

    public function configure(): void
    {

        $this->setPrimaryKey('merchant_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
        $this->setDefaultSort('merchant_name', 'asc');
        $this->setRememberColumnSelectionEnabled();
    }

    public function columns(): array
    {
        return [
            // Column::make("Merchant Id", "merchant_id")
            //     ->sortable(),
            Column::make("Merchant Name", "merchant_name")
                ->sortable()->searchable(),
            Column::make("Merchant Phone", "merchant_phone")
                ->sortable()->searchable(),
            Column::make("Merchant Email", "MerchantOwner.merchant_owner_email")
                ->sortable()->searchable(),
            Column::make("Merchant Address", "merchant_address")
                ->sortable()->searchable(),
            Column::make("owner gender", "MerchantOwner.merchant_owner_gender")
                ->sortable()->hideIf(true),
            Column::make("Owner Name", "MerchantOwner.merchant_owner_name")->format(fn ($value, $row) =>  '(' . $row['MerchantOwner.merchant_owner_gender'] . ') ' . $value)
                ->sortable()->searchable(),
            Column::make("Join Date", "created_at")
                ->sortable(),
            Column::make("Open Status", "merchant_open_status")
                ->hideIf(true)->excludeFromColumnSelect(),
            Column::make("Merchant Status", "merchant_status")
                ->format(fn ($value, $row) => view('components.status-badges', ['value' => $row->merchant_open_status]) . '<span class="mx-1"></span>' . view('components.status-badges', ['value' => $value]))->html()
                ->excludeFromColumnSelect(),
            Column::make("Action", "merchant_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Merchant', 'name' => $row->merchant_name, 'update_modal' => 'merchants.merchants-admin-details', 'deleteModel' => 'merchants.merchants-table', 'deleteMethod' => 'merchantDelete']))->excludeFromColumnSelect(),
        ];
    }
}