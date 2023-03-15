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
 * @property integer $employe_id
 * @property string $name
 * @property string $work_position
 */
class employe extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'employe_id',
        'name',
        'work_position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'employe_id' => 'integer',
        'name' => 'string',
        'work_position' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employe_id' => 'required',
        'name' => 'required',
        'work_position' => 'required'
    ];

    
}
