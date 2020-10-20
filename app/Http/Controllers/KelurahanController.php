<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function view(Request $r)
    {
        $data['kecamatan'] = Kecamatan::find($r->kecamatan_id);
        return view('kelurahan.view', $data);
    }

    public function getAll(Request $r)
    {
        $data['kelurahan'] = Kelurahan::with('tps')->where('kecamatan_id', $r->kecamatan_id)->orderBy('nama', 'asc')->get();
        return $data;
    }

    public function get(Request $r)
    {

    }

    public function create(Request $r)
    {
        $k = new kelurahan();
        $k->nama = $r->nama;
        $k->kecamatan_id = $r->kecamatan_id;
        $k->save();

        return 'success';
    }

    public function edit(Request $r)
    {
        $k = Kelurahan::find($r->id);
        $k->nama = $r->nama;
        $k->save();

        return 'success';
    }

    public function delete(Request $r)
    {
        $k = Kelurahan::find($r->id);
        $k->delete();

        return 'success';
    }
}
