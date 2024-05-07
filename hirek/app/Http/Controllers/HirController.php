<?php

namespace App\Http\Controllers;

use App\Models\hir;
use App\Models\Felolvasas;
use App\Models\Hir_archiv;
use App\Models\Korlatok;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HirController extends Controller
{

    public function index()
    {
        $hir = response()->json(hir::all());
        return $hir;
    }

    public function store(Request $request)
    {
        $hir = new hir;
        $hir->szerkeszto = $request->szerkeszto;
        $hir->cim = $request->cim;
        $hir->tartalom = $request->tartalom;
        $hir->letrehozas_datuma = $request->letrehozas_datuma;
        $hir->utolso_szerkesztes_datuma = $request->utolso_szerkesztes_datuma;
        $hir->felolvasasok_szama = $request->felolvasasok_szama;
        $hir->ervenyesseg = $request->ervenyesseg;
        $hir->save();
    }

    public function show($hir_id)
    {
        $hir = response()->json(hir::find($hir_id));
        return $hir;
    }

    public function update(Request $request, $id)
    {
        $hir = hir::find($id);
        $hir->szerkesztő = $request->szerkesztő;
        $hir->cím = $request->cím;
        $hir->tartalom = $request->tartalom;
        $hir->letrehozas_datuma = $request->letrehozas;
        $hir->utolso_szerkesztes_datuma = $request->utolso_szerkesztes;
        $hir->felolvasasok_szama = $request->felolvasasok_szama;
        $hir->érvényesség = $request->érvényesség;
        $hir->timestamp();
    }

    public function destroy($hir_id)
    {
        $felolvasas = Felolvasas::where('hir', $hir_id)->exists();


        if ($felolvasas) {
            Felolvasas::where('hir', $hir_id)->delete();
        }

        $archiv = Hir_archiv::where('hir', $hir_id)->exists();

        if ($archiv) {
            Hir_archiv::where('hir', $hir_id)->delete();
        }

        $hir = Hir::find($hir_id);

        if ($hir) {
            $hir->delete();
        }

        return redirect('/hir');
    }
    public function felolvasasok($cim)
    {
        $hir = DB::Hir('hir as h')
            ->select('h.hir_id', 'h.cim', 'h.felolvasások_száma')
            ->whereRaw('h.cim like "$cim"')
            ->get();
        return $hir;
    }
    public function hirek_száma($date1, $date2)
    {
        $hir = DB::Hir('hir as h')
            ->select('COUNT(h.hir_id)')
            ->whereRaw('h.letrehozas<$date1 and h.letrehozas>$date2')
            ->get();
        return $hir;
    }
    public function newview()
    {
        $Hir = Hir::all();
        return $Hir('hir.new', ['hir_id' => $Hir]);
    }

    public function editview($id)
    {
        $Hir = Hir::all();
        $Hir = Hir::find($id);
        return $Hir('hir.edit', ['hir_id' => $Hir]);
    }

    public function listview()
    {
        $Hir = Hir::all();
        return view('hir.list', ['hir_id' => $Hir]);
    }
    public function hirview()
    {
        $Hir = Hir::all();
        $korlat=DB::table('korlatoks as korlat')
        ->select('korlat.*')
        ->orderByDesc('korlat.beallitas_kezdete')
        ->limit(1)
        ->get();
        //@dd($korlat);
        return view('hir.ablak',['Hir' => $Hir],['korlat'=>$korlat]);
    }   
    public function kereses($tilte)
    {
        $hir = DB::table('hir as h')
            ->select('hir.*')
            ->where('h.cim', "like", "$tilte")
            ->get();
        return view('Hir.hir', ['hirs' => $hir]);
    }
    public function felolvasas_szamlalo(Request $request, $id)
    {
        $hir = hir::find($id);
        $fel = DB::table('felolvasas as fel')
            ->select('hir')
            ->where('hir', '=', $id)
            ->count();
        $hir->szerkesztő = $request->szerkesztő;
        $hir->cím = $request->cím;
        $hir->tartalom = $request->tartalom;
        $hir->letrehozas_datuma = $request->letrehozas;
        $hir->utolso_szerkesztes_datuma = $request->utolso_szerkesztes;
        $hir->felolvasasok_szama = $fel;
        $hir->érvényesség = $request->érvényesség;
        $hir->save();
    }


    /*public function mentes(Request $request)
    {
        $hir=new hir();
        $hir->szerkeszto=$request->szerkeszto;
        $hir->cim=$request->cim;
        $hir->tartalom=$request->tartalom;
        $hir->letrehozas_datuma=$request->letrehozas_datuma;
        $hir->utolso_szerkesztes_datuma=$request->utolso_szerkesztes_datuma;
        $hir->felolvasasok_szama=$request->felolvasasok_szama;
        $hir->ervenyesseg=$request->ervenyesseg;
        $hir->save();
    }*/

    public function mentes(Request $request)
    {
        // Validate the incoming request data
        $Data = $request->validate([
            'cim' => 'required|string',
            'tartalom' => 'required|string',
        ]);
        $hir = new hir;
        $user = auth()->id();
        $hir->cim = $Data['cim'];
        $hir->szerkeszto = $user;
        $hir->tartalom = $Data['tartalom'];
        $hir->letrehozas = date('y-m-d h:i:s');
        $hir->utolso_szerkesztes = date('y-m-d h:i:s');
        $hir->felolvasasok_szama = '0';
        $hir->ervenyesseg = date('y-m-d h:i:s', strtotime('+ 1 months'));
        $hir->save();
        return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }
    public function fel(Request $request, $id)
    {
        $mentes = hir::find($id);
        $mentes->felolvasasok_szama = ($request->felolvasasok_szama) + 1;
        //$fel=hir::find($id);
        //$fel->felolvasasok_szama=$hir;
        $mentes->save();
    }
    public function Keres(Request $request)
    {
        $search = $request->input('kereses');
        //$hir=hir::all();
        $hirs = DB::table('hirs as hir')
            ->select('hir.*')
            ->where('hir.cim', 'like', "%$search%")
            ->get();
        $korlat=DB::table('korlatoks as korlat')
            ->select('korlat.*')
            ->orderByDesc('korlat.beallitas_kezdete')
            ->limit(1)
            ->get();
        return view('hir.ablak', ['Hir' => $hirs],['korlat'=>$korlat]);
    }
    public function korlat(Request $request)
    {
        // Validate the incoming request data
        $Data = $request->validate([
            'cim_hossza' => 'required|int',
            'tartalom_hossza' => 'required|int',
        ]);
        $korlat = new Korlatok;
        $user = Auth::id();
        $korlat->beallitas_kezdete = date('y-m-d h:i:s');
        $korlat->admin = $user;
        $korlat->cim_hossza = $Data['cim_hossza'];
        $korlat->tartalom_hossza = $Data['tartalom_hossza'];
        return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }

    public function updatefel(Request $request,$id)
    {
        //@dd($Data2);
        $hir = hir::find($id);
        $hir->cim = $request->cim;
        $hir->szerkeszto = $request->szerkeszto;
        $hir->tartalom = $request->tartalom;
        $hir->letrehozas = $request->letrehozas;
        $hir->utolso_szerkesztes = $request->utolso_szerkesztes;
        $hir->felolvasasok_szama =$request->felolvasasok_szama;
        $hir->ervenyesseg = $request->ervenyesseg;
       /* $hir->felolvasasok_szama=$request->felolvasasok_szama+1;
        $hir->cim = $request->cim;
        $hir->szerkeszto = $request->szerkeszto;
        $hir->tartalom = $request->tartalom;
        $hir->letrehozas = $request->letrehozas;
        $hir->utolso_szerkesztes = $request->utolso_szerkesztes;
        $hir->ervenyesseg = $request->ervenyesseg;*/
        $hir->save();
    }

    public function felolvas(Request $request){
    $Data2=$request->input('rows');
    DB::table('hirs')->wherehir_id($Data2['felolvasas'])->increment('felolvasasok_szama');
    return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }

    public function update2(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'cim' => 'required|string',
            'tartalom' => 'required|string',

        ]);
        $Data2=$request->input('rows');
        $hirs = hir::findOrFail($id);
        $hirs->cim = $validatedData['cim'];
        $hirs->tartalom = $validatedData['tartalom'];
        $hirs->save();
        
        return redirect()->back();
    }
}

