<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Employees  extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['employee_id', 'employee_name', 'employee_gender', 'employee_email', 'employee_phone', 'employee_password', 'employee_address', 'employee_status'];
    protected $guarded = array();

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employee_id';

    // public function Provinces()
    // {
    //     $foreignKey = "city_id";
    //     return $this->belongsTo(Provinces::class, $foreignKey, $foreignKey);
    // }
}