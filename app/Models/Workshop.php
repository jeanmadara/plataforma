<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Workshop
 * @package App\Models
 * @version July 20, 2022, 3:42 am UTC
 *
 * @property string $name
 * @property string $description
 * @property string|\Carbon\Carbon $start
 * @property string|\Carbon\Carbon $end
 * @property number $price
 * @property integer $categorie_id
 */
class Workshop extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'workshops';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'start',
        'end',
        'price',
        'categorie_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
        'price' => 'decimal:2',
        'categorie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    
}
