<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_center extends Model
{
    use HasFactory;

    // Relacion Uno a Muchos
    public function teachers()
    {
        return $this->hasMany('App\Models\teacher');
    }

    // Relacion Uno a Muchos
    public function courses()
    {
        return $this->hasMany('App\Models\course');
    }

    protected $fillable = [
        'name',
        'location',
        'imagen_url',
        'imagen_public_id',
    ];
}