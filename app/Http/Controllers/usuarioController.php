<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lienzos;
use App\Models\usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    public function registrar(Request $req) {
        $hoy = getdate();
        $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];
        $u=new usuarios;
        $u->nomUsu=$req->nombreUp;
        $u->apeUsu=$req->apellidosUp;
        $u->email=$req->emailUp;
        $u->perfUsu=0;
        $u->password=Hash::make($req->passUp);
        $u->imagenUsu="https://picsum.photos/200/300?grayscale";
        $u->created_at=$hoy;
        $u->updated_at=$hoy;
        $u->save();
        Auth::login($u);
        return redirect()->route("dashboard");
    }

    public function cambiarFoto(Request $req) {
        $r=usuarios::find(Auth::user()->idUsu);
        $r->imagenUsu=$req->url;
        $r->save();
        return redirect()->route("dashboard");   
    }
}
