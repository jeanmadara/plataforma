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
        'name_workshop',
        'teacher',
        'description_workshop',
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
        'name_workshop' => 'string',
        'teacher' => 'string',
        'description_workshop' => 'string',
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
        'name_workshop' => 'required',
        'teacher' => 'required',
        'description_workshop' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User','user_workshop','workshop_id','user_id')
        ->withPivot('state','user_id');
    } 
    
    //Query Scope

    public function scopeTipo_actividad($query, $name_categorie)
    {
        if($name_categorie)
            return $query->where('categorie_id', 'LIKE', "%$name_categorie%");
            //->join('necesidads', 'fuente_necesidads.necesidad_id', '=', 'necesidads.id');
    }

    public function scopeTeacher($query, $teacher)
    {
        if($teacher)
            return $query->where('Full_name', 'LIKE', "%$teacher%")
            ->join('user_workshop', 'workshops.id', '=', 'user_workshop.workshop_id')
            ->join('users', 'users.id', '=', 'user_workshop.user_id')
           ;
            //->join('necesidads', 'fuente_necesidads.necesidad_id', '=', 'necesidads.id');
    }

    public function scopeName($query, $name_workshop)
    {
        if($name_workshop)
            return $query->where('name_workshop', 'LIKE', "%$name_workshop%");
    }
    
    
}
