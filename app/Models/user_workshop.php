<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class user_workshop
 * @package App\Models
 * @version July 22, 2022, 7:00 pm UTC
 *
 * @property string $state
 * @property foreign $user_id
 * @property foreign $workshop_id
 */
class user_workshop extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_workshop';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'state',
        'user_id',
        'workshop_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'workshop_id' => 'required'
    ];

    public function workshop(){
        return $this->belongsTo('App\Models\Workshop','workshop_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    
}
