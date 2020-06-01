<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertree extends Model
{
    protected $fillable = [
        'user_id', 'parent_id', 'parent_level'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
