<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Session
 * @package App\Models
 * @version July 22, 2022, 8:12 pm UTC
 *
 * @property string $name
 * @property string|\Carbon\Carbon $start
 * @property string|\Carbon\Carbon $end
 * @property integer $workshop_id
 */
class Session extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sessions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'start',
        'end',
        'workshop_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
        'workshop_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'start' => 'required',
        'end' => 'required',
        'workshop_id' => 'required'
    ];

    
}
