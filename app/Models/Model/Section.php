<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'admin',
    ];

    public function Admin()
    {
        return $this->belongsTo('App\Models\User','admin');
    }

    public function Posts()
    {
        return $this->hasMany('App\Models\Model\Post');
    }
}
