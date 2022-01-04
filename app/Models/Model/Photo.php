<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'path',
    ];

    public function Posts()
    {
        return $this->belongsToMany('App\Models\Model\Post','post_photo');
    }
}
