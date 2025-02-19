<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'comments',
        'publish_date',
        'user_id',
        'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
