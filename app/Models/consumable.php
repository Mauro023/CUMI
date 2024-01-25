<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class consumable
 * @package App\Models
 * @version November 30, 2023, 3:26 pm -05
 *
 * @property integer $consumable_quantity
 * @property integer $level
 * @property integer $id_article
 */
class consumable extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'consumables';
    
    public function articles()
    {
        return $this->belongsTo(Articles::class, 'id_article');
    }

    protected $dates = ['deleted_at'];



    public $fillable = [
        'consumable_quantity',
        'level',
        'id_article'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'consumable_quantity' => 'integer',
        'level' => 'integer',
        'id_article' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'consumable_quantity' => 'required',
        'level' => 'required',
        'id_article' => 'required'
    ];

    
}
