<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class surgery
 * @package App\Models
 * @version December 1, 2023, 10:26 am -05
 *
 * @property string $date_surgery
 * @property time $start_time
 * @property time $end_time
 * @property integer surgeryTime
 * @property string $operating_room
 * @property integer $cod_surgical_act
 * @property integer $study_number
 * @property string $patient
 * @property integer $id_doctor
 * @property integer $id_doctor2
 * @property integer $id_anesthesiologist
 * @property integer $id_procedures
 * @property integer $cod_helper
 * @property integer $cod_instrumentator
 * @property integer $cod_rotator
 */
class surgery extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'surgeries';
    
    public function procedures()
    {
        return $this->belongsTo(Procedures::class, 'id_procedures');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'id_doctor');
    }

    public function basket()
    {
        return $this->hasMany(Basket::class, 'surgical_act');
    }

    public function unit_costs()
    {
        return $this->hasMany(Unit_costs::class, 'cod_surgical_act');
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'date_surgery',
        'start_time',
        'end_time',
        'surgeryTime',
        'operating_room',
        'cod_surgical_act',
        'study_number',
        'patient',
        'labours',
        'id_doctor',
        'id_doctor2',
        'id_anesthesiologist',
        'id_procedures',
        'cod_helper',
        'cod_instrumentator',
        'cod_rotator'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_surgery' => 'string',
        'start_time' => 'string',
        'end_time' => 'string',
        'surgeryTime' => 'integer',
        'operating_room' => 'string',
        'cod_surgical_act' => 'integer',
        'study_number' => 'integer',
        'patient' => 'string',
        'id_doctor' => 'integer',
        'id_doctor2' => 'integer',
        'id_anesthesiologist' => 'integer',
        'cod_procedures' => 'integer',
        'cod_helper' => 'integer',
        'cod_instrumentator' => 'integer',
        'cod_rotator' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date_surgery' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'operating_room' => 'required',
        'cod_surgical_act' => 'required',
        'study_number' => 'required',
        'patient' => 'required',
        'id_doctor' => 'required',
        'cod_procedures' => 'required',
        
    ];

    
}
