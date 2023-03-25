<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class employe
 * @package App\Models
 * @version March 15, 2023, 8:02 pm UTC
 *
 * @property integer $dni
 * @property string $name
 * @property string $work_position
 * @property string $unit
 * @property string $cost_center
 */
class employe extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employes';

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni',
        'name',
        'work_position',
        'unit',
        'cost_center'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dni' => 'integer',
        'name' => 'string',
        'work_position' => 'string',
        'unit' => 'string',
        'cost_center' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dni' => 'required',
        'name' => 'required',
        'work_position' => 'required',
        'unit' => 'required',
        'cost_center' => 'required'
    ];

    
}
