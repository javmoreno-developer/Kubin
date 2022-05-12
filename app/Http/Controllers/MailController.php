<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\grupos;
use App\Models\usuarios;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function sendEmail(Request $req) {
        
        //crear grupo
        $hoy = getdate();
        $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];

        $t=new grupos;
        $t->nomGrup=$req->name;
        $t->created_at=$hoy;
        $t->updated_at=$hoy;
        $t->save();

        //usuarios_has_grupos
        $me=usuarios::find(Auth::user()->idUsu);
        //$me->lienzos()->attach($modelo->idLie,["created_at"=>"$hoy","updated_at"=>"$hoy"]);
        $me->grupos()->attach($t->idGrup,["created_at"=>"$hoy"]);

        //emails
       /* $emails=explode(",",$req->email_group);

        for($i=0;$i<sizeof($emails);$i++) {
            $details=[
                "title" => "Invitación a grupo",
                "body" => "Hola!, $emails[$i] has sido invitado a un grupo por ".Auth::user()->nomUsu,
            ];
            Mail::to($emails[$i])->send(new TestMail($details));
        }*/

       return redirect()->route("dashboard");
    }
}
