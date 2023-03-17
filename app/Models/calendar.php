<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class calendar
 * @package App\Models
 * @version March 15, 2023, 8:51 pm UTC
 *
 * @property string $workday
 * @property string $entry_time
 * @property string $departure_time
 * @property string $floor
 * @property integer $id_employe
 */
class calendar extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'calendars';
    
    public function employe(): BelongsTo
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'workday',
        'entry_time',
        'departure_time',
        'floor',
        'id_employe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'workday' => 'string',
        'entry_time' => 'string',
        'departure_time' => 'string',
        'floor' => 'string',
        'id_employe' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'workday' => 'required',
        'entry_time' => 'required',
        'departure_time' => 'required',
        'floor' => 'required',
        'id_employe' => 'required'
    ];

    
}
