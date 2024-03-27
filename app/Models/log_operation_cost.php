<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class log_operation_cost
 * @package App\Models
 * @version February 2, 2024, 9:21 am -05
 *
 * @property integer $percentage_uvr
 * @property string $time_procedure
 * @property integer $doctor_percentage
 * @property number $doctor_fees
 * @property integer $doctor2_percentage
 * @property number $doctor2_fees
 * @property integer $anest_percentage
 * @property number $anest_fees
 * @property integer $total_uvr
 * @property number $room_cost
 * @property number $gases
 * @property number $labour
 * @property integer $cod_surgical_act
 * @property integer $code_procedure
 */
class log_operation_cost extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'log_operation_costs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'percentage_uvr',
        'time_procedure',
        'doctor_percentage',
        'doctor_fees',
        'doctor2_percentage',
        'doctor2_fees',
        'anest_percentage',
        'anest_fees',
        'total_uvr',
        'room_cost',
        'gases',
        'labour',
        'cod_surgical_act',
        'code_procedure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'percentage_uvr' => 'decimal:2',
        'time_procedure' => 'string',
        'doctor_percentage' => 'integer',
        'doctor_fees' => 'decimal:2',
        'doctor2_percentage' => 'integer',
        'doctor2_fees' => 'decimal:2',
        'anest_percentage' => 'integer',
        'anest_fees' => 'decimal:2',
        'total_uvr' => 'integer',
        'room_cost' => 'decimal:2',
        'gases' => 'decimal:2',
        'labour' => 'decimal:2',
        'cod_surgical_act' => 'integer',
        'code_procedure' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
