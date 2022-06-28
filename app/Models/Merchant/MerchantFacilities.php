<?php

namespace App\Models\Merchant;

use App\Models\Admin\Facilities;
use App\Models\Admin\Merchants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantFacilities extends Model
{
    use HasFactory;

    protected $fillable = ['merchant_id', 'facility_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merchant_facilities';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'merchant_facility_id';

    public function Facilities()
    {
        $foreignKey = "facility_id";
        return $this->belongsTo(Facilities::class, $foreignKey, $foreignKey);
    }

    public function Merchants()
    {
        $foreignKey = "merchant_id";
        return $this->belongsTo(Merchants::class, $foreignKey, $foreignKey);
    }
}