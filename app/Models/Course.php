<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];

    // Relación Uno a Muchos (Inversa) con Area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // Relación Uno a Muchos (Inversa) con TrainingCenter
    public function training_center()
    {
        return $this->belongsTo(Training_center::class);
    }

    // Relación Uno a Muchos con Aprendices
    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }

    // Relación Muchos a Muchos con Instructores
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}