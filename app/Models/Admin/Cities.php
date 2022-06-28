<?php

namespace App\Models\Admin;

use App\Models\Merchant\Merchants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'city_id';
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

    public function Provinces()
    {
        $foreignKey = "province_id";
        return $this->belongsTo(Provinces::class, $foreignKey, $foreignKey);
    }

    public function District()
    {
        return $this->hasMany(District::class, $this->primaryKey, $this->primaryKey);
    }

    public function Merchants()
    {
        return $this->hasMany(Merchants::class, $this->primaryKey, $this->primaryKey);
    }
}