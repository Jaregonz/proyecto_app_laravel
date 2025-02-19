<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'publish_date',
        'n_likes',
        'belongs_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'belongs_to');
    }

    // Relación con los comentarios
    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }
}
