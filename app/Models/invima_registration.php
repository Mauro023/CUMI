<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class invima_registration
 * @package App\Models
 * @version August 28, 2023, 10:04 am -05
 *
 * @property string $health_register
 * @property string $validity_registration
 * @property string $laboratory_manufacturer
 */
class invima_registration extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'invima_registrations';
    

    public function medicine()
    {
        return $this->hasMany(Medicine::class);
    }

    public function medicationTemplate()
    {
        return $this->hasMany(medicationTemplate::class);
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'health_register',
        'validity_registration',
        'laboratory_manufacturer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'health_register' => 'string',
        'validity_registration' => 'string',
        'laboratory_manufacturer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'health_register' => 'required',
        'validity_registration' => 'required',
        'laboratory_manufacturer' => 'required'
    ];

    
}
