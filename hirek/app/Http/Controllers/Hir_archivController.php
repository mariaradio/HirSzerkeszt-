<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hir_archiv;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;

class Hir_archivController extends Controller
{
    public function index()
    {
        $archiv = response()->json(Hir_archiv::all());
        return $archiv;
    }

    public function show($hir, $csere)
    {
        $archiv = Hir_archiv::where('csere', $csere)->where('hir', $hir)->get();
        return $archiv;
    }
    public function destroy($hir, $csere)
    {
        $this->show($hir, $csere)->deleted();
        return redirect('/Hir_archiv/list');
    }
    public function store(Request $request, $hir, $csere)
    {
        $archiv = $this->show($hir, $csere);
        $archiv->ervenyesseg = $request->ervenyesseg;
        $archiv->cim = $request->cim;
        $archiv->tartalom = $request->tartalom;
        $archiv->save();
    }
    public function update(Request $request, $hir, $csere)
    {
        $archiv = $this->show($hir, $csere);
        $archiv->ervenyesseg = $request->ervenyesseg;
        $archiv->cim = $request->cim;
        $archiv->tartalom = $request->tartalom;
        $archiv->save();
    }
    public function newView()
    {
        $Hir_archiv = Hir_archiv::all();
        return $Hir_archiv('Hir_archiv.new', ['hir' => $Hir_archiv]);
    }

    public function editView($id)
    {
        $user = Hir_archiv::all();
        $user = Hir_archiv::find($id);
        return $user('Hir_archiv.edit', ['hir' => $user]);
    }

    public function listView()
    {
        $Hir_archiv = Hir_archiv::all();
        return view('Hir_archiv.list', ['hir' => $Hir_archiv]);
    }
    public function show2()
    {
        $data = Hir_archiv::all();
        return view('hir_archiv.hir_archiv', ['hir_arhiv' => $data]);
    }
    public function keresesAh(Request $request){
        $search=$request->input('kereses');
        $hir=DB::table('hir_archivs as h')
        ->select('h.*')
        ->where('h.cim',"like","%$search%")
        ->get(['*']);
        return view('hir_archiv.hir_archiv',['hir_arhiv'=>$hir]);
    }
}