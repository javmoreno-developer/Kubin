<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lienzoController;
use App\Http\Controllers\usuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing/index');
});

Route::get("/tutorial",function() {
    return view("tutorial/index");
});

Route::get("/showcase",function() {
    return view("showcase/index");
});

Route::get("/login",function() {
    return view("login/index");
})->name("login");

Route::post("registrar",[usuarioController::class,"registrar"])->name("registrar");

Route::get("/tablero/",[lienzoController::class,"editar"])->name("tablero");

Route::post("/tablero/",[lienzoController::class,"subida"])->name("tablero2");

Route::get("/dashboard",[lienzoController::class,"dashboard"])->name("dashboard");

Route::get("/crearLienzo/",[lienzoController::class,"crearLienzo"])->name("crearLienzo");

Route::get("/borrarLienzo/{id}",[lienzoController::class,"borrarLienzo"])->name("borrarLienzo");

Route::post("obtenerDatos",[lienzoController::class,"obtenerDatos"])->name("obtenerDatos");

Route::get("borrar",function() {
    return view("borrar/index");
})->name("borrar");
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::get("out",function() {
     Auth::logout();
     return redirect()->route("login");
});

require __DIR__.'/auth.php';

/*Route::fallback(function() {
    return view("404/index");
});*/