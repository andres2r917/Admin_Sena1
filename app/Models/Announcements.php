<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;

    public function training_center()
    {
        return $this->belongsTo('App\Models\training_center');
    }

    protected $fillable = [
        'title',
        'content',
        'publish_date',
        'training_center_id',
    ];

    protected $guarded = [
        'urlFoto'
    ];
}