<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Scholarship
 * @package App\Models
 * @version July 11, 2022, 12:08 am UTC
 *
 * @property string $name
 * @property string $description
 */
class Scholarship extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'scholarships';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'percentage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'percentage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'percentage' => 'numeric',
    ];

    
}
