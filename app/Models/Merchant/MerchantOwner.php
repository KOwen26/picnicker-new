<?php

namespace App\Models\Merchant;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class MerchantOwner extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['merchant_owner_id', 'merchant_owner_email', 'merchant_owner_password'];
    protected $guarded = array();
    protected $hidden = ['merchant_owner_id', 'merchant_owner_password', 'created_at', 'updated_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merchant_owner';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'merchant_owner_id';
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


    public function Merchants()
    {
        return $this->hasMany(Merchants::class, $this->primaryKey, $this->primaryKey);
    }

    public function MerchantOwnerId()
    {
        $year = date("y");
        $month = date("m");
        $day = date("d");
        $index = "0001";
        $unique = Str::upper(Str::random(4));
        $prefix = "MOR-$year$month$day";
        $lastId = $this->where('merchant_owner_id', 'like', "$prefix%")->max('merchant_owner_id');
        if ($lastId) {
            $newId = (intval(substr($lastId, -4)) + 1);
            $index = substr("000$newId", -4);
        }
        $id = "$prefix-$unique-$index";
        return $id;
    }
}