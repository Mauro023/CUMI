<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Medicine
 * @package App\Models
 * @version June 21, 2023, 9:04 am -05
 *
 * @property string $admission_date
 * @property integer $act_number
 * @property string $generic_name
 * @property string $tradename
 * @property string $concentration
 * @property string $pharmaceutical_form
 * @property string $presentation
 * @property string $expiration_date
 * @property string $lot_number
 * @property string $health_register
 * @property string $registration_validity
 * @property string $observation_record
 * @property string $manufacturer_laboratory
 * @property string $supplier
 * @property string $invoice_number
 * @property integer $received_amount
 * @property string $purchase_order
 * @property string $entered_by
 * @property integer $sample
 * @property string $lettering
 * @property string $packing
 * @property string $laminate
 * @property string $closing
 * @property string $all
 * @property string $liquids
 * @property string $semisolid
 * @property string $dust
 * @property string $tablet
 * @property string $capsule
 * @property string $arrival_temperature
 * @property string $observations
 * @property string $state
 */
class Medicine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'medicines';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'admission_date',
        'act_number',
        'generic_name',
        'tradename',
        'concentration',
        'pharmaceutical_form',
        'presentation',
        'expiration_date',
        'lot_number',
        'health_register',
        'registration_validity',
        'observation_record',
        'manufacturer_laboratory',
        'supplier',
        'invoice_number',
        'received_amount',
        'purchase_order',
        'entered_by',
        'sample',
        'lettering',
        'packing',
        'laminate',
        'closing',
        'all',
        'liquids',
        'semisolid',
        'dust',
        'tablet',
        'capsule',
        'arrival_temperature',
        'observations',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'admission_date' => 'date',
        'act_number' => 'integer',
        'generic_name' => 'string',
        'tradename' => 'string',
        'concentration' => 'string',
        'pharmaceutical_form' => 'string',
        'presentation' => 'string',
        'expiration_date' => 'date',
        'lot_number' => 'string',
        'health_register' => 'string',
        'registration_validity' => 'date',
        'observation_record' => 'string',
        'manufacturer_laboratory' => 'string',
        'supplier' => 'string',
        'invoice_number' => 'string',
        'received_amount' => 'integer',
        'purchase_order' => 'string',
        'entered_by' => 'string',
        'sample' => 'integer',
        'lettering' => 'string',
        'packing' => 'string',
        'laminate' => 'string',
        'closing' => 'string',
        'all' => 'string',
        'liquids' => 'string',
        'semisolid' => 'string',
        'dust' => 'string',
        'tablet' => 'string',
        'capsule' => 'string',
        'arrival_temperature' => 'string',
        'observations' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'admission_date' => 'required',
        'act_number' => 'required',
        'generic_name' => 'required',
        'concentration' => 'required',
        'pharmaceutical_form' => 'required',
        'presentation' => 'required',
        'expiration_date' => 'required',
        'lot_number' => 'required',
        'health_register' => 'required',
        'registration_validity' => 'required',
        'manufacturer_laboratory' => 'required',
        'supplier' => 'required',
        'invoice_number' => 'required',
        'received_amount' => 'required',
        'purchase_order' => 'required',
        'entered_by' => 'required',
        'sample' => 'required',
        'state' => 'required'
    ];

    
}
