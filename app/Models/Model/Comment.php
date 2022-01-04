<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'user_id',
        'post_id',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Post()
    {
        return $this->belongsTo('App\Models\Model\Post');
    }
}
