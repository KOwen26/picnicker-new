<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'district';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'district_id';
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
        $foreignKey = "city_id";
        return $this->belongsTo(Provinces::class, $foreignKey, $foreignKey);
    }
}