<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lienzos;
use App\Models\usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class usuarioController extends Controller
{
    public function registrar(Request $req) {
        if(session()->has('repe')) {
            session()->forget('repe');
            $not=false;
        }

        $hoy = getdate();
        $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];

        //vemos si el ususario existe
        $existing=usuarios::where("email",$req->emailUp)->get();

        if(sizeof($existing)==0) {
            $u=new usuarios;
            $u->nomUsu=$req->nombreUp;
            $u->apeUsu=$req->apellidosUp;
            $u->email=$req->emailUp;
            if($req->prem == "on") {
                $u->perfUsu=2;
            } else {
                $u->perfUsu=0;
            }
            $u->password=Hash::make($req->passUp);
            $u->imagenUsu="https://picsum.photos/500/300?grayscale";
            $u->created_at=$hoy;
            $u->updated_at=$hoy;
            $u->save();
            Auth::login($u);
           return redirect()->route("dashboard");
       } else {
            //notificacion
           $not=true;
           echo session()->has('repe');

           if(session()->has('repe')) {
                session()->forget('repe');
                $not=false;
                echo "hay session bro";
            }
            session(['repe' => "true"]);
            echo "aw";
            echo "<br>";
            echo $not;
            echo "<br>";
            echo $req->emailUp;
            
           //return view("login.index",["register"=>true,"notificacion"=>$not]);
       }
    }

    public function cambiarFoto(Request $req) {
        if($req->url!=null) {
            $r=usuarios::find(Auth::user()->idUsu);
            $r->imagenUsu=$req->url;
            $r->save();
            $r->clearMediaCollection('avatars');
        }
        return redirect()->route("dashboard");   
    }

    public function cambiarFotoFile(Request $data) {
        if(isset($data->avatar)) {
            $r=usuarios::find(Auth::user()->idUsu);
            $r->clearMediaCollection('avatars');
            $r->addMediaFromRequest("avatar")->toMediaCollection("avatars");
        }
        return redirect()->route("dashboard");   
    }

    public function premium() {
        $r=usuarios::find(Auth::user()->idUsu);
        $r->perfUsu=2;
        $r->save();
    }
}
