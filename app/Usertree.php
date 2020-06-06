<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertree extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'parent_id', 'id');
    }

    public function photoupload(){
        return $this->belongsTo('App\Photoupload', 'photo_id', 'id');
    }
}
