<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $table = 'suara';
    public $timestamps = false;

    public function tps()
    {
        return $this->belongsTo('App\Tps');
    }

    public function paslon()
    {
        return $this->belongsTo('App\Paslon');
    }
}
