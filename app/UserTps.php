<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userTps extends Model
{
    protected $table = 'user_tps';
    public $timestamps = false;

    public function tps()
    {
        return $this->belongsTo('App\Tps');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
