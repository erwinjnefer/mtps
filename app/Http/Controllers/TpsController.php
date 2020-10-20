<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\Tps;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    public function view(Request $r)
    {
        $data['kelurahan'] = Kelurahan::find($r->kelurahan_id);
        return view('tps.view', $data);
    }

    public function getAll(Request $r)
    {
        $data['tps'] = Tps::where('kelurahan_id', $r->kelurahan_id)->orderBy('nama', 'asc')->get();
        return $data;
    }

    public function get(Request $r)
    {

    }

    public function create(Request $r)
    {
        $t = new tps();
        $t->nama = $r->nama;
        $t->kelurahan_id = $r->kelurahan_id;
        $t->save();

        return 'success';
    }

    public function edit(Request $r)
    {
        $t = Tps::find($r->id);
        $t->nama = $r->nama;
        $t->save();

        return 'success';
    }

    public function delete(Request $r)
    {
        $t = Tps::find($r->id);
        $t->delete();

        return 'success';
    }
}
