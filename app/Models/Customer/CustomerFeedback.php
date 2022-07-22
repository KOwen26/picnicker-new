<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_feedback';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_feedback_id';

    public function Customers()
    {
        $foreignKey = "customer_id";
        return $this->belongsTo(Customers::class, $foreignKey, $foreignKey);
    }

    public function scopeMerchants($query, $merchant_id)
    {
        $query->join('transactions', 'transactions.transaction_id', 'customer_feedback.transaction_id')->where('transactions.merchant_id', $merchant_id);
    }
}