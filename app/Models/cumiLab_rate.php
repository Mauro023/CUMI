<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class cumiLab_rate
 * @package App\Models
 * @version March 12, 2024, 4:24 pm -05
 *
 * @property string $period
 * @property number $january
 * @property number $february
 * @property number $march
 * @property number $april
 * @property number $june
 * @property number $july
 * @property number $august
 * @property number $october
 * @property number $november
 * @property number $december
 * @property number $total_months
 * @property number $average_months
 * @property number $cumilab_rate
 * @property number $mutual_rate
 * @property number $pxq
 * @property number $part_percentage
 * @property number $adminlog_percentage
 * @property number $cd_percentage
 * @property number $total
 * @property string $cups
 */
class cumiLab_rate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cumi_lab_rates';
    

    protected $dates = ['deleted_at'];

    public function procedures()
    {
        return $this->belongsTo(procedures::class, 'cups', 'code');
    }

    public $fillable = [
        'period',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'total_months',
        'average_months',
        'cumilab_rate',
        'mutual_rate',
        'pxq',
        'part_percentage',
        'adminlog_percentage',
        'cd_percentage',
        'total',
        'cups'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'period' => 'string',
        'january' => 'decimal:2',
        'february' => 'decimal:2',
        'march' => 'decimal:2',
        'april' => 'decimal:2',
        'may' => 'decimal:2',
        'june' => 'decimal:2',
        'july' => 'decimal:2',
        'august' => 'decimal:2',
        'september' => 'decimal:2',
        'october' => 'decimal:2',
        'november' => 'decimal:2',
        'december' => 'decimal:2',
        'total_months' => 'decimal:2',
        'average_months' => 'decimal:2',
        'cumilab_rate' => 'decimal:2',
        'mutual_rate' => 'decimal:2',
        'pxq' => 'decimal:2',
        'part_percentage' => 'decimal:2',
        'adminlog_percentage' => 'decimal:2',
        'cd_percentage' => 'decimal:2',
        'total' => 'decimal:2',
        'cups' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'period' => 'required',
        'cumilab_rate' => 'required',
        'mutual_rate' => 'required',
        'cups' => 'required'
    ];

    
}
