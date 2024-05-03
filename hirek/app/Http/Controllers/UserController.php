<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mime\Email;

class UserController extends Controller
{
    public function index(){
            $users = User::all();
            return view('user.user', ['users' => $users]);
    }

    public function show($id){
        $user=response()->json(User::find($id));
        return $user;
    }

    public function destroy($id){
        User::find($id)->deleted();
        return redirect('/User/list');
    }

    public function store(Request $request,$id){
        $user=User::find($id);
        $user->felhasznalo_nev =$request->felhasznalo_nev;
        $user->password =$request->password;
        $user->email =$request->email;
        $user->admin=$request->admin;
        $user->szerkeszto=$request->szerkeszto;
        $user->olvaso=$request->olvaso;
        $user->timestamp();
        $user->save();
    }

    public function update(Request $request,$id){
        $user=User::find($id);
        $user->felhasznalo_nev =$request->felhasznalo_nev;
        $user->password =$request->jelszo;
        $user->email =$request->email;
        $user->admin=$request->admin;
        $user->szerkeszto=$request->szerkeszto;
        $user->olvaso=$request->olvaso;
        $user->timestamp();
        $user->save();
    }

    public function newView(){
        $user=User::all();
        return view('user.new',['users'=>$user]);

    }

    public function editView($id){
        $user=User::all();
        $user=User::find($id);
        return view('user.edit',['users'=>$user]);
    }

    public function listView(){
        $user=User::all();
        return view('user.list',['users'=>$user]);
    }

    public function show2(){
        $data=User::all();
        return view('user.user',['user'=>$data]);
    }
    public function kereses($name){
        $user=DB::table('useres as user')
        ->select('felhasznalo_nev')
        ->where('user.felhasznalo_nev',"like","$name")
        ->get();
        return view('user.user',['user'=>$user]);
    }
    public function torles($id){
        $user=DB::table('users as user')
        ->select('id')
        ->where('user_id','=',$id)
        ->delete();
    }
    public function mentes(Request $request){
        $user=new User();
        $user->felhasznalo_nev =$request->felhasznalo_nev;
        $user->password =$request->password;
        $user->email =$request->email;
        $user->admin=$request->admin;
        $user->szerkeszto=$request->szerkeszto;
        $user->olvaso=$request->olvaso;
        $user->timestamp();
        $user->save();
    }

    public function update2(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'felhasznalonev' => 'required|string',
            'jelszo' => 'required|string',
            'email' => 'required|email',
           // 'admin' => 'required|boolean',
           // 'szerkeszto' => 'required|boolean',
           // 'olvaso' => 'required|boolean',
        ]);
        $Data2=$request->input('rows');
        $user = User::findOrFail($id);
        $user->felhasznalo_nev = $validatedData['felhasznalonev'];
        $user->password = Hash::make($validatedData['jelszo']);
        $user->email = $validatedData['email'];
       // $user->admin = $validatedData['admin'];
       // $user->szerkeszto = $validatedData['szerkeszto'];
       // $user->olvaso = $validatedData['olvaso'];
        if(array_key_exists('admin', $Data2)){
        $user->admin=1;
        }else{
            $user->admin=0;
        }
        if(array_key_exists('szerkeszto', $Data2)){
            $user->szerkeszto=1;
        }else{
            $user->szerkeszto=0;
        }
        if(array_key_exists('olvaso', $Data2)){
            $user->olvaso=1;
        }else{
            $user->olvaso=0;
        }
        $user->save();
        
        return redirect()->back();
    }
    
    /*public function update2(Request $request, $id){
        $Data=$request->all();
        
        //error_log($Data2['olvaso']);
        $user = User::findOrFail($id);
        $user->felhasznalo_nev = $Data['felhasznalonev'];
        $user->password =$Data['jelszo'];
        $user->email =$Data['email'];

        $user->save();
        return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }*/
    public function felhasznaloMentes(Request $request){
        $Data=$request->all();
        /*$Data = $request->validate([
            'felhasznalo_nev' =>'required|string',
            'password' =>'required|string',
            'email' => 'required|email|unique:users',
        ]);*/
        $user=new User;
        $user->felhasznalo_nev = $Data['felhasznalo_nev'];
        $user->password =$Data['password'];
        $user->email =$Data['email'];
        //$user->admin=$Data['admin'];
        if(in_array('admin', $Data)){
            $user->admin=1;
        }else{
            $user->admin=0;
        }
        if(in_array('szerkeszto', $Data)){
            $user->szerkeszto=1;
        }else{
            $user->szerkeszto=0;
        }
        if(in_array('olvaso', $Data)){
            $user->olvaso=1;
        }else{
            $user->olvaso=0;
        }
        $user->save();
        return redirect()->back()->with('siker', 'Új sikeres felvétele');
    }
    public function KeresUs(Request $request){
        $search=$request->input('kereses');
        //$hir=hir::all();
        $user=DB::table('users')
        ->select('users.*')
        ->where('users.felhasznalo_nev','like',"%$search%")
        ->get();
        return view('user.user',['user'=>$user]);
    }
}
/*
     {{$cat->adopted==1 ?'checked':''}}                                           
*/