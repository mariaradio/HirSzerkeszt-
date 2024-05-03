<?php

namespace App\Http\Controllers;

use App\Models\Felolvasas;
use App\Models\hir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\Count;

use function Laravel\Prompts\select;

class FelolvasasController extends Controller
{
    public function index(){
        $archiv=response()->json(Felolvasas::all());
        return $archiv;
    }

    public function create(){
        return view('Felolvasas.new');
    }

    public function show($felolvasas_datuma,$hir){
        $archiv=Felolvasas::where('felolvasas_datuma',$felolvasas_datuma)->where('hir',$hir)->get();
        return $archiv;
    }
    public function destroy($felolvasas_datuma,$hir){
        $archiv=Felolvasas::where('felolvasas_datuma',$felolvasas_datuma)->where('hir',$hir)->deleted();
        return redirect('/Felolvasas/list');
    }
    public function store(Request $request,$felolvasas_datuma,$hir){
        $archiv=$this->show($hir,$felolvasas_datuma);
        $archiv->ervenyesseg=$request->ervenyesseg;
        $archiv->felovasas_datuma=$request->felovasas_datuma;
        $archiv->tartalom=$request->tartalom;
        $archiv->save();
    }
    public function update(Request $request,$felolvasas_datuma,$hir){
        $archiv=$this->show($hir,$felolvasas_datuma);
        $archiv->ervenyesseg=$request->ervenyesseg;
        $archiv->felovasas_datuma=$request->felovasas_datuma;
        $archiv->tartalom=$request->tartalom;
        $archiv->save();
    }
    public function newView(){
        $Felolvasas=Felolvasas::all();
        return $Felolvasas('Felolvasas.new',['hir'=>$Felolvasas]);

    }

    public function editView($id){
        $Felolvasas=Felolvasas::all();
        $Felolvasas=Felolvasas::find($id);
        return $Felolvasas('Felolvasas.edit',['hir'=>$Felolvasas]);
    }

    public function listView(){
        $Felolvasas=Felolvasas::all();
        return view('Felolvasas.list',['hir'=>$Felolvasas]);
    }
    public function indexView(){
        return view('Felolvasas.index');
    }


    /*public function show2(){
        $fel=DB::table('felolvasas as fel')
        ->select('fel.*', 'hirs.*')
        ->join('hirs','fel.hir','=','hirs.hir_id')
        ->get();
        return view('Felolvasas.felolvasas',['fel'=>$fel]);
    }*/
    public function show2(){
        $fel=DB::table('hirs as hir')
        ->select('hir.*')
        ->get();
        return view('Felolvasas.felolvasas',['fel'=>$fel]);
    }
    
    
    public function Keresf(Request $request){
        $search=$request->input('kereses');
        //$hir=hir::all();
        $fel=DB::table('felolvasas as fel')
        ->select('fel.*', 'hirs.*')
        ->join('hirs','fel.hir','=','hirs.hir_id')
        ->where('hirs.cim','like',"%$search%")
        ->get();
        return view('Felolvasas.felolvasas',['fel'=>$fel]);
    }
}
