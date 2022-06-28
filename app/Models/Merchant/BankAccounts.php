<?php

namespace App\Models\Merchant;

use App\Models\Admin\Banks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;
    protected $hidden = ['bank_account_id', 'merchant_id', 'created_at', 'updated_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bank_accounts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'bank_account_id';
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

    public function BankAccountId($merchant_owner_id)
    {
        $bank_account_id = substr_replace($merchant_owner_id, 'BAC', 0, 3);
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
        return $bank_account_id;
    }

    public function Banks()
    {
        $foreignKey = "bank_id";
        return $this->belongsTo(Banks::class, $foreignKey, $foreignKey);
    }

    public function Merchants()
    {
        $foreignKey = "merchant_id";
        return $this->belongsTo(Merchants::class, $foreignKey, $foreignKey);
    }
}