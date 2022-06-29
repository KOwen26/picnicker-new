<?php

namespace App\Models\Merchant;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Merchants extends Model
{
    use HasFactory;
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merchants';
    protected $guarded = array();
    protected $casts = [
        'merchant_pictures',
        'merchant_open_schedule',
    ];
    protected $hidden = ['merchant_owner_id', 'created_at'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'merchant_id';
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

    public function MerchantId($merchant_owner_id)
    {
        $merchant_id = substr_replace($merchant_owner_id, 'MRC', 0, 3);
        // $year = date("y");
        // $month = date("m");
        // $day = date("d");
        // $index = "0001";
        // $unique = Str::random(4);
        // $prefix = "MOR-$year$month$day";
        // $lastId = $this->where('merchant_owner_id', 'like', "$prefix%")->max('merchant_owner_id');
        // if ($lastId) {
        //     $newId = (intval(substr($lastId, -4)) + 1);
        //     $index = substr("000$newId", -4);
        // }
        // $id = "$prefix-$unique-$index";
        return $merchant_id;
    }

    public function MerchantOwner()
    {
        $foreignKey = "merchant_owner_id";
        return $this->belongsTo(MerchantOwner::class, $foreignKey, $foreignKey);
    }

    public function MerchantType()
    {
        $foreignKey = "merchant_type_id";
        return $this->belongsTo(MerchantType::class, $foreignKey, $foreignKey);
    }

    public function BankAccounts()
    {
        return $this->hasMany(BankAccounts::class, $this->primaryKey, $this->primaryKey);
    }

    public function MerchantFacilities()
    {
        return $this->hasMany(MerchantFacilities::class, $this->primaryKey, $this->primaryKey);
    }

    // Scope
    public function scopeStatus($query, $status)
    {
        return $query->where('merchant_status', $status);
    }

    public function scopeRestaurant($query)
    {
        return $query->where('merchant_type_id', 1);
    }

    public function scopeTourismVillage($query)
    {
        return $query->where('merchant_type_id', 2);
    }
}