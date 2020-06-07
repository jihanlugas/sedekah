<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertree extends Model
{
    protected $guarded = [];

    const CONFIRMATION_STATUS_WAITING = 0;
    const CONFIRMATION_STATUS_APPROVE = 1;
    const CONFIRMATION_STATUS_REJECT = 2;


    const CONFIRMATION_STATUS_NAME_WAITING = 'WAITING';
    const CONFIRMATION_STATUS_NAME_APPROVE = 'APPROVE';
    const CONFIRMATION_STATUS_NAME_REJECT = 'REJECT';

    public static $confirmation_status = [
        self::CONFIRMATION_STATUS_WAITING => self::CONFIRMATION_STATUS_NAME_WAITING,
        self::CONFIRMATION_STATUS_APPROVE => self::CONFIRMATION_STATUS_NAME_APPROVE,
        self::CONFIRMATION_STATUS_REJECT => self::CONFIRMATION_STATUS_NAME_REJECT,
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'parent_id', 'id');
    }

    public function photoupload(){
        return $this->belongsTo('App\Photoupload', 'photo_id', 'id');
    }
}
