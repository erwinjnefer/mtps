<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TidakSah extends Model
{
    protected $table = 'tidak_sah';
    public $timestamps = false;

    public function tps()
    {
        return $this->belongsTo('App\Tps');
    }
}
