<?php

namespace App\Http\Livewire\Products;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Merchant\ProductCategories;
use Illuminate\Database\Eloquent\Builder;

class ProductCategoriesTable extends DataTableComponent
{
    protected $model = ProductCategories::class;

    // public function builder(): Builder
    // {
    //     return ProductCategories::query();
    //     // dd(->where('product_category_id', 2)->first()->ParentCategory); // Select some things
    // }

    protected $listeners = ['productCategoriesDelete' => 'productCategoriesDelete', 'refreshComponent' => '$refresh'];
    public function configure(): void
    {
        $this->setPrimaryKey('product_category_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    public function productCategoriesDelete(ProductCategories $product_categories)
    {
        $product_categories->delete();
        $this->emit('closeModal', 'others.delete-modal');
        $this->emit('refreshComponent');
    }

    public function columns(): array
    {
        return [
            Column::make("Merchant Type", "MerchantType.merchant_type_name")
                ->sortable()->searchable(),
            Column::make("Parent Category", "parent_id")->format(fn ($value) => ProductCategories::ParentCategory($value)?->first()?->product_category_name ?: '-')
                ->sortable()->searchable(),
            Column::make("Category Name", "product_category_name")
                ->sortable()->searchable(),
            Column::make("Status", "product_category_status")
                ->format(fn ($value) => view('components.status-badges', ['value' => $value, 'type' => 'regular']))
                ->sortable()->excludeFromColumnSelect(),
            Column::make("Action", "product_category_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Kategori Produk', 'name' => $row->product_category_name, 'update_modal' => 'products.product-categories-details', 'deleteModel' => 'products.product-categories-table', 'deleteMethod' => 'productCategoryDelete']))->excludeFromColumnSelect(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}