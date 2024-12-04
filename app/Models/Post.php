<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
