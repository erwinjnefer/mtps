<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    protected $table = 'paslon';
    public $timestamps = false;

    public function suara()
    {
        return $this->hasMany('App\Suara');
    }
}
