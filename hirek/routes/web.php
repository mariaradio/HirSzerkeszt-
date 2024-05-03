<?php

use App\Http\Controllers\FelolvasasController;
use App\Http\Controllers\Hir_archivController;
use App\Http\Controllers\HirController;
use App\Http\Controllers\KorlatokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Hir;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hir',[HirController::class,'hirview'], function () {
    return view('hir.hir');
})->middleware(['auth', 'verified'])->name('hir');

Route::get('/hir_archiv',[Hir_archivController::class,'show2'], function () {
    return view('hir_archiv.hir_archiv');
})->middleware(['auth', 'verified'])->name('hir_archiv');

Route::get('/user',[UserController::class,'show2'], function () {
    return view('user.user');
})->middleware(['auth', 'verified'])->name('user');

Route::get('/felolvasas',[FelolvasasController::class,'show2'], function () {
    return view('Felolvasas.felolvasas');
})->middleware(['auth', 'verified'])->name('felolvasas');

Route::put('/users/{id}', [UserController::class, 'update' ])->name('user.update');
Route::put('/users/{id}', [UserController::class, 'update2' ])->name('user.update2');
Route::post('/hirs',[HirController::class,'mentes'])->middleware(['auth','verified'])->name('mentes');
Route::post('/increment-felolvasasok-szama', [HirController::class, 'incrementFelolvasasokSzama']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth.basic'])->group(function () {
    Route::apiResource('api/hir_archiv', Hir_archivController::class);
    Route::apiResource('api/hir', HirController::class);
    Route::apiResource('api/users', UserController::class);
    Route::apiResource('api/korlat', KorlatokController::class);
    Route::apiResource('api/felolvasas', FelolvasasController::class);
    Route::get('/kereses',[HirController::class,'Keres'],function () {
        return view('hir.hir');
    })->middleware(['auth', 'verified'])->name('Keres');
    Route::get('/KeresUs',[UserController::class,'KeresUs'],function () {
        return view('user.user');
    })->middleware(['auth', 'verified'])->name('KeresUs');
    //Route::resource('felolvasas', FelolvasasController::class);
    Route::get('/Keresf',[FelolvasasController::class,'Keresf'],function () {
        return view('Felolvasas.felolvasas');
    })->middleware(['auth', 'verified'])->name('Keresf');
    Route::get('/keresesAh',[Hir_archivController::class,'keresesAh'],function () {
        return view('Felolvasas.felolvasas');
    })->middleware(['auth', 'verified'])->name('keresesAh');
    Route::get('/korlat',[HirController::class,'korlat'])->name('korlat');
    //view
    Route::get('/user/new', [UserController::class, 'newView']);
    Route::get('/user/edit/{id}', [UserController::class, 'editView']);
    Route::get('/user/list', [UserController::class, 'listView']);
    Route::get('/fel/{id}', [HirController::class, 'fel' ])->name('fel');
    Route::post('/felhasznaloMentes',[UserController::class,'felhasznaloMentes'])->name('felhasznaloMentes');
    Route::post('/felolvasas',[HirController::class,'felolvas']);
    Route::post('/users', [KorlatokController::class, 'update3' ])->name('user.update3');
});
//felhasznaloMentes


require __DIR__.'/auth.php';