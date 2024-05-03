<?php

namespace App\Http\Controllers;

use App\Models\Korlatok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KorlatokController extends Controller
{
    public function index(){
        $korlatok=response()->json(Korlatok::all());
        return $korlatok;
    }

    public function show($id){
        $korlatok=response()->json(Korlatok::find($id));
        return $korlatok;
    }

    public function destroy($id){
        Korlatok::find($id)->deleted();
        return redirect('/Korlatok/list');
    }

    public function store(Request $request,$id){
        $korlatok=Korlatok::find($id);
        $korlatok->beallitas_kezdete =$request->beallitas_kezdete;
        $korlatok->admin=$request->admin;
        $korlatok->cim_hossza =$request->cim_hossza;
        $korlatok->tartalom_hossza =$request->tartalom_hossza;
        $korlatok->timestamp();
        $korlatok->save();
    }

    public function update(Request $request,$id){
        $korlatok=Korlatok::find($id);
        $korlatok->beallitas_kezdete =$request->beallitas_kezdete;
        $korlatok->admin=$request->admin;
        $korlatok->cim_hossza =$request->cim_hossza;
        $korlatok->tartalom_hossza =$request->tartalom_hossza;
        $korlatok->timestamp();
        $korlatok->save();
    }
    public function newView(){
        $Korlatok=Korlatok::all();
        return $Korlatok('Korlatok.new',['user'=>$Korlatok]);

    }

    public function editView($id){
        $Korlatok=Korlatok::all();
        $Korlatok=Korlatok::find($id);
        return $Korlatok('Korlatok.edit',['user'=>$Korlatok]);
    }

    public function listView(){
        $Korlatok=Korlatok::all();
        return view('Korlatok.list',['user'=>$Korlatok]);
    }
    public function update3(Request $request){
        $Data = $request->validate([
            'cim_hossza' => 'required|Integer',
            'tartalom_hossza' => 'required|Integer',
        ]);
        //@dd($Data);
        $korlatok=new Korlatok();
        $korlatok->beallitas_kezdete=date('y-m-d h:i:s');
        $korlatok->admin=auth()->id();
        $korlatok->cim_hossza =$Data['cim_hossza'];
        $korlatok->tartalom_hossza =$Data['tartalom_hossza'];
        //$korlatok->created_at=date('y-m-d h:i:s');
        //$korlatok->updated_at=date('y-m-d h:i:s');
        $korlatok->save();
        return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }
    public function help(){
        $korlat=(DB::table('korlatoks as korlat')
        ->select('korlat.*')
        ->latest('beallitas_kezdete')->first());
        return $korlat;
    }
}
