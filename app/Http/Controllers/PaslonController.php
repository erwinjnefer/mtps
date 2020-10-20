<?php

namespace App\Http\Controllers;

use App\Paslon;
use Illuminate\Http\Request;

class PaslonController extends Controller
{

    public function view()
    {
        return view('paslon.view');
    }

    public function getAll()
    {
        $data['paslon'] = Paslon::orderBy('nama', 'asc')->get();
        return $data;
    }

    public function get(Request $r)
    {

    }

    public function create(Request $r)
    {
        $p = new Paslon();
        $p->nama = $r->nama;
        $p->save();

        return 'success';
    }

    public function edit(Request $r)
    {
        $p = Paslon::find($r->id);
        $p->nama = $r->nama;
        $p->save();

        return 'success';
    }

    public function delete(Request $r)
    {
        $k = Paslon::find($r->id);
        $k->delete();

        return 'success';
    }
}
