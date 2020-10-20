<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table = 'kecamatan';
    public $timestamps = false;

    public function kelurahan()
    {
        return $this->hasMany('App\Kelurahan');
    }
}
