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
 * @property string $workday
 * @property string $entry_time
 * @property string $departure_time
 * @property integer $id_employe
 */
class attendance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'attendances';

    public function employe(): BelongsTo
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'workday',
        'entry_time',
        'departure_time',
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
        'id_employe' => 'required'
    ];

    
}
