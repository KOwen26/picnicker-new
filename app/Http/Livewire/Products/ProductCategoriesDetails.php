<?php

namespace App\Http\Livewire\Products;

use App\Models\Admin\Facilities;
use App\Models\Merchant\MerchantType;
use App\Models\Merchant\ProductCategories;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ProductCategoriesDetails extends ModalComponent
{
    public $product_category, $parent_id, $product_category_id, $product_category_name, $merchant_type_id,  $product_category_status = true;

    public function mount($id = null)
    {
        if ($id) {
            $this->product_category = ProductCategories::find($id);
            $this->product_category_id = $this->product_category->product_category_id;
            $this->product_category_name = $this->product_category->product_category_name;
            $this->merchant_type_id = $this->product_category->merchant_type_id;
            $this->parent_id = $this->product_category->parent_id;
            $this->product_category_status = $this->product_category->product_category_status == 'ACTIVE' ? true : false;
        }
    }

    public function resetInput()
    {
        $this->product_category_id = null;
        $this->product_category_name = null;
        $this->merchant_type_id = null;
        $this->parent_id = null;
        $this->product_category_description = null;
    }

    public function validation()
    {
    }

    public function store()
    {
        ProductCategories::create([
            'merchant_type_id' => $this->merchant_type_id,
            'parent_id' => $this->parent_id != 'null' ? $this->parent_id : null,
            'product_category_name' => $this->product_category_name,
            'product_category_status' => 'ACTIVE'
        ]);

        $this->resetInput();
        $this->emitTo('products.product-categories-table', 'refreshComponent');
        $this->closeModal();
    }

    public function update()
    {
        // dd($this->product_category, $this->product_category_status, $this->product_category_status != true ? 'DISABLED' : 'ACTIVE');
        $product_category = ProductCategories::find($this->product_category_id);
        $product_category->product_category_name = $this->product_category_name;
        $product_category->merchant_type_id = $this->merchant_type_id;
        $product_category->parent_id = $this->parent_id != 'null' ? $this->parent_id : null;
        $product_category->product_category_status = $this->product_category_status !== true ? 'DISABLED' : 'ACTIVE';
        $product_category->save();

        $this->resetInput();
        $this->emitTo('products.product-categories-table', 'refreshComponent');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.products.product-categories-details', ['merchant_types' => MerchantType::all(), 'parent_categories' => ProductCategories::where('parent_id', null)->get()]);
    }
}