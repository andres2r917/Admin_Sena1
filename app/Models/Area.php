<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relación Uno a Muchos
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    // Relación Uno a Muchos
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}