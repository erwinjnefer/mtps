<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    public $timestamps = false;

    public function tps()
    {
        return $this->hasMany('App\Tps');
    }
}
