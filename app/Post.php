<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'token',
        'category_id'
    ];

    public function postInfo(){
        return $this->hasOne('App\PostInfo');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
