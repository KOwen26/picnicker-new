<?php

namespace App\Models\Customer;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\CustomerFeedback;
use App\Models\Merchant\Merchants;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transactions extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';
    protected $fillable = ['transaction_id'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_id';
    public $incrementing = false;

    public function Merchant()
    {
        $foreignKey = 'merchant_id';
        return $this->belongsTo(Merchants::class, $foreignKey, $foreignKey);
    }

    public function Customer()
    {
        $foreignKey = 'customer_id';
        return $this->belongsTo(Customers::class, $foreignKey, $foreignKey);
    }

    public function Payment()
    {
        return $this->hasOne(Payments::class, $this->primaryKey, $this->primaryKey);
    }

    public function TransactionId()
    {
        $year = date("y");
        $month = date("m");
        $day = date("d");
        $index = "0001";
        $unique = Str::upper(Str::random(6));
        $prefix = "INV-$year$month$day";
        $lastId = $this->where('transaction_id', 'like', "$prefix%")->max('transaction_id');
        if ($lastId) {
            $newId = (intval(substr($lastId, -4)) + 1);
            $index = substr("000$newId", -4);
        }
        $id = "$prefix-$unique-$index";
        return $id;
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('transaction_status', $status);
    }
    public function scopeTransactionMerchant($query, $merchant_id)
    {
        return $query->where('merchant_id', $merchant_id);
    }
    public function scopeTransactionCustomer($query, $customer_id)
    {
        return $query->where('customer_id', $customer_id);
    }
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
