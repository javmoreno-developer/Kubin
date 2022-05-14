<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lienzoController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\grupoController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\App;

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
})->name("/");

Route::get("/tutorial",function() {
    return view("tutorial/index");
})->name("tutorial");

Route::get("/showcase",function() {
    return view("showcase/index");
})->name("showcase");

Route::get("/login",function() {
    return view("login/index");
})->name("login");

Route::post("registrar",[usuarioController::class,"registrar"])->name("registrar");

Route::get("/tablero/",[lienzoController::class,"editar"])->middleware(["auth"])->name("tablero");

Route::post("/tablero/",[lienzoController::class,"subida"])->middleware(["auth"])->name("tablero2");

Route::get("/dashboard",[lienzoController::class,"dashboard"])->middleware(["auth"])->name("dashboard");

Route::get("/crearLienzo/",[lienzoController::class,"crearLienzo"])->middleware(["auth"])->name("crearLienzo");

Route::get("/borrarLienzo/{id}",[lienzoController::class,"borrarLienzo"])->middleware(["auth"])->name("borrarLienzo");

Route::post("obtenerDatos",[lienzoController::class,"obtenerDatos"])->middleware(["auth"])->name("obtenerDatos");

Route::get("pagina/{numero}",[lienzoController::class,"dashboard"])->middleware(["auth"])->name("pagina");

Route::get("borrar",function() {
    return view("borrar/index");
})->name("borrar");
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::get("out",function() {
     Auth::logout();
     return redirect()->route("login");
})->middleware(["auth"])->name("out");

Route::post("cambiarFoto",[usuarioController::class,"cambiarFoto"])->middleware(["auth"])->name("cambiarFoto");


Route::post("idioma/",function () {
    $e=$_POST["datos"]["variable1"];
    // Retrieve a piece of data from the session...
    $value = session('idioma_session');
 
    // Specifying a default value...
    $value = session('idioma_session', $e);
 
    // Store a piece of data in the session...
    session(['idioma_session' => $e]);

    session()->put("locale",$e);
    //return redirect()->route("/");
})->name("idioma");


//mailing y creacion de grupos
Route::post("/send-email",[MailController::class,"sendEmail"])->middleware("auth")->name("send-email");

//ver grupos
Route::get("/grupo/{id}",[grupoController::class,"ver"])->middleware("auth")->name("grupo");

//cargar categorias en el selector
Route::post("cargarCat",[categoriaController::class,"cargar"])->name("cargarCat");

//add categorias
Route::post("addCat",[categoriaController::class,"add"])->name("addCat");


require __DIR__.'/auth.php';

Route::fallback(function() {
    return view("404/index");
});