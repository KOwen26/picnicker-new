<?php

namespace App\Models\Customer;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';

    protected $fillable = ['payment_id'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'payment_id';
    public $incrementing = false;
    // public function CustomerFeedback()
    // {
    //     return $this->hasMany(CustomerFeedback::class, $this->primaryKey, $this->primaryKey);
    // }

    public function PaymentId($transaction_id)
    {
        $payment_id = substr_replace($transaction_id, 'PAY', 0, 3);
        return $payment_id;
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }
}