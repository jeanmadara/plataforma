<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Profile
 * @package App\Models
 * @version July 11, 2022, 4:31 pm UTC
 *
 * @property string $full_name
 * @property string $dni
 * @property string $phone
 * @property string $description
 * @property integer $user_id
 */
class Profile extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'profiles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'full_name',
        'dni',
        'phone',
        'description',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'full_name' => 'string',
        'dni' => 'string',
        'phone' => 'string',
        'description' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'dni' => 'required',
        'phone' => 'numeric',
        'user_id' => 'required'
    ];

    public function users(){
        return $this->hasOne('App\Models\User','id');
    }

    
}
