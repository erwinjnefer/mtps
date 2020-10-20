<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function view()
    {
        return view('kabupaten.view');
    }

    public function getAll()
    {
        $data['kabupaten'] = Kabupaten::with('kecamatan')->orderBy('nama', 'asc')->get();
        return $data;
    }

    public function get(Request $r)
    {

    }

    public function create(Request $r)
    {
        $k = new Kabupaten();
        $k->nama = $r->nama;
        $k->save();

        return 'success';
    }

    public function edit(Request $r)
    {
        $k = Kabupaten::find($r->id);
        $k->nama = $r->nama;
        $k->save();

        return 'success';
    }

    public function delete(Request $r)
    {
        $k = Kabupaten::find($r->id);
        $k->delete();

        return 'success';
    }
}
