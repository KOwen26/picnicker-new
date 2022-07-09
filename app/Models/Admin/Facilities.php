<?php

namespace App\Models\Admin;

use App\Models\Merchant\MerchantFacilities;
use App\Models\Merchant\MerchantType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $fillable = ['facility_name', 'merchant_type_id', 'facility_icon', 'facility_description'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'facilities';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'facility_id';

    public function MerchantFacilities()
    {
        return $this->hasMany(MerchantFacilities::class, $this->primaryKey, $this->primaryKey);
    }

    public function MerchantType()
    {
        $foreignKey = "merchant_type_id";
        return $this->belongsTo(MerchantType::class, $foreignKey, $foreignKey);
    }
}