<?php

namespace App\Models\Customer;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Customers extends Authenticatable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    protected $fillable = ['customer_id', 'customer_email', 'customer_name', 'customer_password', 'customer_status'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    public function CustomerFeedback()
    {
        return $this->hasMany(CustomerFeedback::class, $this->primaryKey, $this->primaryKey);
    }

    public function CustomerId()
    {
        $year = date("y");
        $month = date("m");
        $day = date("d");
        $index = "0001";
        $unique = Str::upper(Str::random(4));
        $prefix = "CST-$year$month$day";
        $lastId = $this->where('customer_id', 'like', "$prefix%")->max('customer_id');
        if ($lastId) {
            $newId = (intval(substr($lastId, -4)) + 1);
            $index = substr("000$newId", -4);
        }
        $id = "$prefix-$unique-$index";
        return $id;
    }
}