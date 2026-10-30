<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'duration',
        'modality',
        'image', 
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}