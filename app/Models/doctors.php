<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class doctors
 * @package App\Models
 * @version December 1, 2023, 9:52 am -05
 *
 * @property integer $code
 * @property integer $dni
 * @property string $full_name
 * @property string $specialty
 * @property integer $id_rates
 * @property integer $id_fees
 */
class doctors extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'doctors';

    public function surgeries()
    {
        return $this->hasMany(Surgery::class, 'id_doctor');
    }

    public function diferential_rates()
    {
        return $this->hasMany(Diferential_rates::class, 'code', 'id_doctor');
    }

    public function medical_fees()
    {
        return $this->belongsTo(Medical_fees::class, 'id_fees', 'honorary_code');
    }

    public function medical_fees2()
    {
        return $this->belongsTo(Medical_fees::class, 'id_fees2', 'honorary_code');
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'dni',
        'full_name',
        'category_doctor',
        'specialty',
        'payment_type',
        'id_fees',
        'id_fees2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'integer',
        'dni' => 'integer',
        'full_name' => 'string',
        'category_doctor' => 'string',
        'specialty' => 'string',
        'payment_type' => 'string',
        'id_fees' => 'integer',
        'id_fees2' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'dni' => 'required',
        'full_name' => 'required',
        'category_doctor' => 'required',
        'specialty' => 'required',
        'payment_type' => 'required',
        'id_fees' => 'required',
        'id_fees2' => 'required'
    ];

    
}
