<?php
use App\Http\Controllers\HirController;
use App\Http\Controllers\Hir_archivController;
use App\Http\Controllers\FelolvasasController;
use App\Http\Controllers\KorlatokController;
use App\Http\Controllers\UserController;
;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});
Route::get('/felolvasasok/{id}', [FelolvasasController::class, 'felolvasasok' ])->name('felolvasasok');
Route::get('user',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);
Route::post('user',[UserController::class,'store']);
Route::put('user/{id}',[UserController::class,'update']);
Route::delete('user',[UserController::class,'destroy']);
Route::get('user/new',[UserController::class,'newview']);
Route::get('user/edit/{id}',[UserController::class,'editView']);
Route::get('user/list',[UserController::class,'listview']);

Route::get('hir',[HirController::class,'index']);
//Route::get('hir/{hir_id}',[HirController::class,'show']);
Route::post('hir',[HirController::class,'store']);
Route::put('hir/{id}',[HirController::class,'update']);
Route::delete('hir',[HirController::class,'destroy']);
Route::get('hir/new',[HirController::class,'newview']);
Route::get('hir/edit/{id}',[HirController::class,'editView']);
Route::get('hir/list',[HirController::class,'listview']);
//Route::get('hir/hir',[HirController::class,'hirview']);

Route::get('korlatok',[KorlatokController::class,'index']);
Route::get('korlatok/{id}',[KorlatokController::class,'show']);
Route::post('korlatok',[KorlatokController::class,'store']);
Route::put('korlatok/{id}',[KorlatokController::class,'update']);
Route::delete('korlatok',[KorlatokController::class,'destroy']);
Route::get('korlatok/new',[KorlatokController::class,'newview']);
Route::get('korlatok/edit/{id}',[KorlatokController::class,'editView']);
Route::get('korlatok/list',[KorlatokController::class,'listview']);

Route::get('felolvasas',[FelolvasasController::class,'index']);
Route::get('felolvasas/{felolvasas_datuma,hir}',[FelolvasasController::class,'show']);
Route::post('felolvasas',[FelolvasasController::class,'store']);
Route::put('felolvasas/{felolvasas_datuma,hir}',[FelolvasasController::class,'update']);
Route::delete('felolvasas',[FelolvasasController::class,'destroy']);
Route::get('Felolvasas/new',[FelolvasasController::class,'newview']);
Route::get('Felolvasas/edit/{felolvasas_datuma,hir}',[FelolvasasController::class,'editView']);
Route::get('Felolvasas/list',[FelolvasasController::class,'listview']);
Route::get('Felolvasas/index',[FelolvasasController::class,'indexview']);

Route::get('hir_archiv',[Hir_archivController::class,'index']);
Route::get('hir_archiv/{$hir,$csere}',[Hir_archivController::class,'show']);
Route::post('hir_archiv',[Hir_archivController::class,'store']);
Route::put('hir_archiv/{$hir,$csere}',[Hir_archivController::class,'update']);
Route::delete('hir_archiv',[Hir_archivController::class,'destroy']);
Route::get('hir_archiv/new',[Hir_archivController::class,'newview']);
Route::get('hir_archiv/edit/{$hir,$csere}',[Hir_archivController::class,'editView']);
Route::get('hir_archiv/list',[Hir_archivController::class,'listview']);

?>
