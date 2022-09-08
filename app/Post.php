<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'token'
    ];

    public function postInfo(){
        return $this->hasOne('App\PostInfo');
    }
}
