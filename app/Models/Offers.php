<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    public function programs()
    {
        return $this->belongsTo('App\Models\programs', 'program_id');
    }

    public function cohorts()
    {
        return $this->hasMany('App\Models\cohort');
    }
    
    protected $fillable = [
        'shift',
        'registration_date',
        'capacity',
        'program_id',
    ];
}