<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Kecamatan;
use Illuminate\Http\Request;

class KecamtanController extends Controller
{
    public function view(Request $r)
    {
        $data['kabupaten'] = Kabupaten::find($r->kabupaten_id);
        return view('kecamatan.view', $data);
    }

    public function getAll(Request $r)
    {
        $data['kecamatan'] = Kecamatan::with('kelurahan')->where('kabupaten_id', $r->kabupaten_id)->orderBy('nama', 'asc')->get();
        return $data;
    }

    public function get(Request $r)
    {

    }

    public function create(Request $r)
    {
        $k = new Kecamatan();
        $k->nama = $r->nama;
        $k->kabupaten_id = $r->kabupaten_id;
        $k->save();

        return 'success';
    }

    public function edit(Request $r)
    {
        $k = Kecamatan::find($r->id);
        $k->nama = $r->nama;
        $k->save();

        return 'success';
    }

    public function delete(Request $r)
    {
        $k = Kecamatan::find($r->id);
        $k->delete();

        return 'success';
    }
}
