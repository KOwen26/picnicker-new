<?php

namespace App\Http\Livewire\Products;

use App\Models\Merchant\MerchantType;
use App\Models\Merchant\ProductCategories;
use App\Models\Merchant\Products;
use LivewireUI\Modal\ModalComponent;

class ProductsDetails extends ModalComponent
{
    public $product, $product_id, $merchant_id, $product_name, $product_category_id, $product_sell_price, $product_quantity = 1, $product_description, $product_status = true;

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }


    public function mount($id = null)
    {
        if ($id) {
            $product = Products::find($id);
            $this->product_id = $product->product_id;
            $this->product_name = $product->product_name;
            $this->product_category_id = $product->product_category_id;
            $this->product_sell_price = $product->product_sell_price;
            $this->product_quantity = $product->product_quantity;
            $this->product_description = $product->product_description;
            $this->product_status = $product->product_status == 'ACTIVE' ? true : false;
        }
        $this->merchant_id = auth()->guard('merchant')->user()->Merchants->first()->merchant_id;
    }

    public function resetInput()
    {
        $this->product_id = null;
        $this->product_name = null;
        $this->product_category_id = null;
        $this->product_sell_price = null;
        $this->product_description = null;
    }

    public function validation()
    {
    }

    public function store()
    {
        // dd($this);
        $product = new Products();
        $product->fill([
            'product_id' => $product->ProductId($this->merchant_id),
            'merchant_id' => $this->merchant_id,
            'product_name' => $this->product_name,
            'product_category_id' => $this->product_category_id ?? 1,
            'product_sell_price' => $this->product_sell_price,
            'product_quantity' => $this->product_quantity,
            'product_description' => $this->product_description ?? null,
            'product_status' => 'ACTIVE'
        ]);
        $product->save();
        $this->resetInput();
        $this->emitTo('products.merchants-products-table', 'refreshComponent');
        $this->closeModal();
    }

    public function update()
    {
        $product = Products::find($this->product_id);
        $product->product_name = $this->product_name;
        $product->product_category_id = $this->product_category_id;
        $product->product_sell_price = $this->product_sell_price;
        $product->product_quantity = $this->product_quantity;
        $product->product_description = $this->product_description;
        $product->product_status = $this->product_status !== true ? 'DISABLED' : 'ACTIVE';
        $product->save();

        $this->resetInput();
        $this->emitTo('products.merchants-products-table', 'refreshComponent');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.products.products-details', ['product_categories' => ProductCategories::all()]);
    }
}