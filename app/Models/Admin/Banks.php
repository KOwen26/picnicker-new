<?php

namespace App\Models\Admin;

use App\Models\Merchant\BankAccounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_code',
        'bank_picture',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banks';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'bank_id';

    public function BankAccounts()
    {
        return $this->hasMany(BankAccounts::class, $this->primaryKey, $this->primaryKey);
    }
}