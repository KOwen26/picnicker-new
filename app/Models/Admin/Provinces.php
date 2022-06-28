<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provinces';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'province_id';

    public function Cities()
    {
        return $this->hasMany(Cities::class, $this->primaryKey, $this->primaryKey);
    }
}