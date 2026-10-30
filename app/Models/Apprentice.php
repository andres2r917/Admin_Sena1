<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;
    //Relacion Uno a Muchos (Inversa) con User
    public function course(){
        return $this->belongsTo('App\Models\course');
    }
    public function computer(){
        return $this->hasOne('App\Models\computer');
    }
    
    protected $fillable = [
        'name',
        'email',
        'cell_number',
        'course_id',
        'computer_id',
       
    ];
}