<?php

namespace App\Http\Livewire\Products;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Merchant\Products;

class MerchantsProductsTable extends DataTableComponent
{
    protected $model = Products::class;
    protected $listeners = ['productDelete' => 'productDelete', 'refreshComponent' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('product_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function productDelete(Products $product)
    {
        $product->delete();
        $this->emit('closeModal', 'others.delete-modal');
        $this->emit('refreshComponent');
    }

    public function columns(): array
    {
        return [
            // Column::make("Kode Produk", "product_id")
            //     ->sortable(),
            Column::make("Nama Produk", "product_name")
                ->sortable()->searchable(),
            Column::make("Kategori Produk", "ProductCategory.product_category_name")
                ->sortable()->searchable(),
            Column::make("Harga Jual", "product_sell_price")->format(fn ($value, $row) => 'Rp ' . number_format($value, 0, '', '.'))
                ->sortable()->searchable(),
            Column::make("Stok Harian Produk", "product_quantity")
                ->sortable()->searchable(),
            Column::make("Action", "product_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => '', 'name' => $row->product_name, 'update_modal' => 'products.products-details', 'deleteModel' => 'products.merchants-products-table', 'deleteMethod' => 'productDelete']))->excludeFromColumnSelect(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}