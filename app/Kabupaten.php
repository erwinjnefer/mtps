<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    //
    protected $table = 'kabupaten';
    public $timestamps = false;

    public function kecamatan()
    {
        return $this->hasMany('App\Kecamatan');
    }
}
