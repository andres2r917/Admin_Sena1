<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    public function apprentice()
    {
        return $this->hasOne('App\Models\apprentice');
    }

    protected $fillable = [  
        'number',
        'brand',
        'environment_id',
        'imagen_url',
        'imagen_public_id',
    ];
}