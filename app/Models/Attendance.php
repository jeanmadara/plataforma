<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Attendance
 * @package App\Models
 * @version July 31, 2022, 9:38 pm UTC
 *
 * @property string $state
 * @property string $name_user
 * @property integer $user_id
 * @property integer $session_id
 */
class Attendance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'attendances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'state',
        'name_user',
        'user_id',
        'session_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'state' => 'string',
        'name_user' => 'string',
        'user_id' => 'integer',
        'session_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'session_id' => 'required'
    ];

    public function sessions(){
        return $this->belongsToMany('App\Models\Session','attendance_session','attendance_id','sessions_id')->withTimestamps();
    } 
}
