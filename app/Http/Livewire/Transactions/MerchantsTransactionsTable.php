<?php

namespace App\Http\Livewire\Transactions;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer\Transactions;
use Illuminate\Database\Eloquent\Builder;

setlocale(LC_ALL, 'id-ID', 'id_ID');

class MerchantsTransactionsTable extends DataTableComponent
{
    // protected $model =  Transactions::class;
    public function builder(): Builder
    {
        return Transactions::query()->TransactionMerchant(auth()->guard('merchant')->user()->merchants->first()->merchant_id);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('transaction_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function columns(): array
    {
        return [
            Column::make("Kode Reservasi", "transaction_id")->sortable()->searchable(),
            Column::make("Nama Pelanggan", "customer.customer_name")->sortable()->searchable(),
            Column::make("Kontak Pelanggan", "customer.customer_phone")->sortable()->searchable(),
            Column::make("Tanggal Reservasi", "transaction_date")->format(fn ($value, $row) => strftime('%A, %d %B %Y %H:%M', strtotime($value)) . ' WIB')
                ->sortable(),
            Column::make("Jumlah Pengunjung", "transaction_item_quantity")->format(fn ($value, $row) => $value . ' Orang')
                ->sortable(),
            Column::make("Status Reservasi", "transaction_status")
                ->format(fn ($value, $row) => view('components.status-badges', ['value' => $row->transaction_status, 'type' => 'transaction']))->html()
                ->excludeFromColumnSelect(),
            Column::make("Action", "transaction_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Reservasi', 'name' => $row->transaction_id, 'update_modal' => 'transactions.merchants-transactions-details', 'deleteModel' => 'transaction.merchants-transaction-table', 'deleteMethod' => 'transactionDelete']))->excludeFromColumnSelect(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}