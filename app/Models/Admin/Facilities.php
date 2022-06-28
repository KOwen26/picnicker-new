<?php

namespace App\Models\Admin;

use App\Models\Merchant\MerchantFacilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $fillable = ['facility_name', 'facility_type', 'facility_icon', 'facility_description'];
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
}