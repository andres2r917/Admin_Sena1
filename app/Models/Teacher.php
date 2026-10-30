<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo('App\Models\area');
    }

     //Relacion Uno a Muchos (Inversa) 
    public function training_center(){
        return $this->belongsTo('App\Models\training_center');
    }

    //Relacion muchos a muchos
    public function courses(){
        return $this->belongsToMany('App\Models\course');
    }



    protected $fillable = [
        'name',
        'email',
        'area_id',
        'training_center_id',
       
    ];
}