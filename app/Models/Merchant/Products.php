<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = array();
    protected $fillable = ['product_id', 'merchant_id', 'product_category_id', 'product_name', 'product_sell_price', 'product_quantity', 'product_description', 'product_status'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_id';
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    public function ProductId($merchant_id)
    {
        $product_id = substr_replace($merchant_id, 'PDC', 0, 3);
        $index = "0001";
        $prefix = $product_id;
        $lastId = $this->where('product_id', 'like', "$prefix%")->max('product_id');
        if ($lastId) {
            $newId = (intval(substr($lastId, -4)) + 1);
            $index = substr("000$newId", -4);
        }
        $id = "$prefix-$index";
        return $id;
    }

    public function ProductCategory()
    {
        $foreignKey = "product_category_id";
        return $this->belongsTo(ProductCategories::class, $foreignKey, $foreignKey);
    }
}