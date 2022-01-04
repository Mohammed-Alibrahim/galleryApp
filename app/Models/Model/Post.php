<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'section_id',
        'user_id',
    ];

    public function Section()
    {
        return $this->belongsTo('App\Models\Model\Section');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Comments()
    {
        return $this->hasMany('App\Models\Model\Comment');
    }

    public function Photos()
    {
        return $this->belongsToMany('App\Models\Model\Photo','post_photo');
    }
}
