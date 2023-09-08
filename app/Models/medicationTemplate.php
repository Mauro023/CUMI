<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class medicationTemplate
 * @package App\Models
 * @version August 28, 2023, 12:09 pm -05
 *
 * @property string $template_name
 * @property string $generic_namet
 * @property string $tradenamet
 * @property string $concentrationt
 * @property string $pharmaceutical_formt
 * @property string $presentationt
 * @property string $registration_validityt
 * @property string $manufacturer_laboratoryt
 * @property integer $received_amountt
 * @property integer $samplet
 * @property integer $invima_registrations_id
 */
class medicationTemplate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'medication_templates';
    
    public function invima_registration()
    {
        return $this->belongsTo(Invima_registration::class, 'invima_registrations_id');
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'template_name',
        'generic_namet',
        'tradenamet',
        'concentrationt',
        'pharmaceutical_formt',
        'presentationt',
        'registration_validityt',
        'manufacturer_laboratoryt',
        'received_amountt',
        'samplet',
        'invima_registrations_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'template_name' => 'string',
        'generic_namet' => 'string',
        'tradenamet' => 'string',
        'concentrationt' => 'string',
        'pharmaceutical_formt' => 'string',
        'presentationt' => 'string',
        'registration_validityt' => 'string',
        'manufacturer_laboratoryt' => 'string',
        'received_amountt' => 'integer',
        'samplet' => 'integer',
        'invima_registrations_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'template_name' => 'required',
        'generic_namet' => 'required',
        'tradenamet' => 'required',
        'concentrationt' => 'required',
        'pharmaceutical_formt' => 'required',
        'presentationt' => 'required',
        'registration_validityt' => 'required',
        'manufacturer_laboratoryt' => 'required',
        'received_amountt' => 'required',
        'samplet' => 'required',
        'invima_registrations_id' => 'required'
    ];

    
}
