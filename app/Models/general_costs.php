<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class general_costs
 * @package App\Models
 * @version December 1, 2023, 11:16 am -05
 *
 * @property string $description
 * @property number $value
 */
class general_costs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'general_costs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'value' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'value' => 'required'
    ];

    
}
