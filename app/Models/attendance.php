<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class attendance
 * @package App\Models
 * @version March 16, 2023, 11:56 am -05
 *
 * @property date $workday
 * @property string $entry_time
 * @property string $departure_time
 * @property integer $employe_id
 */
class attendance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'attendances';

    public function employe(): BelongsTo
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'workday',
        'entry_time',
        'departure_time',
        'employe_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'workday' => 'date',
        'entry_time' => 'string',
        'departure_time' => 'string',
        'employe_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'workday' => 'required',
        'entry_time' => 'required',
        'employe_id' => 'required'
    ];

    
}
