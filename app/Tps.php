<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $table = 'tps';
    public $timestamps = false;

    public function suara()
    {
        return $this->hasMany('App\Suara');
    }

    public function userTps()
    {
        return $this->hasOne('App\UserTps');
    }
}
