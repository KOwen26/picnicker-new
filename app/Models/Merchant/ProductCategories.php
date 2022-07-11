<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;

    protected $fillable = ['product_category_name', 'parent_id', 'merchant_type_id', 'product_category_status'];

    protected $primaryKey = 'product_category_id';
    public function MerchantType()
    {
        $foreignKey = "merchant_type_id";
        return $this->belongsTo(MerchantType::class, $foreignKey, $foreignKey);
    }

    // public function ParentCategory()
    // {
    //     return $this->belongsTo(ProductCategories::class,  'parent_id', 'product_category_id');
    // }
    public function scopeParentCategory($query, $parent_id)
    {
        return $query->where('product_category_id', $parent_id);
    }

    // public function childs()
    // {
    //     return $this->belongsToMany(ProductCategories::class, 'product_categories', 'parent_id', 'product_category_id')->as('child');
    // }
    // public function parents()
    // {
    //     return $this->belongsToMany(ProductCategories::class, 'product_categories', 'product_category_id', null, 'parent_id', 'child')->as('parent');
    // }
}