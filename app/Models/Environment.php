<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;
    
    public function training_center()
    {
        return $this->belongsTo('App\Models\training_center');
    }
    public function courses()
    {
        return $this->hasMany('App\Models\course');
    }

    public function computers()
    {
        return $this->hasMany('App\Models\computer');
    }

    protected $fillable = [
        'name',
        'location',
        'training_center_id',
        'imagen_url',
        'imagen_public_id',
        'urlFoto'
    ];

}