<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use App\Models\grupos;
use Illuminate\Support\Facades\Auth;

class grupoController extends Controller
{
    public function ver($param) {
        $r=grupos::find($param);

        //usuarios de un grupo
        //obtengo id de usuarios
        $usuarios=$r->usuarios()->get();

        $nombres=[];
        //obtengo nombres
        for($i=0;$i<sizeof($usuarios);$i++) {
            $local=usuarios::find($usuarios[$i]["pivot"]["idUsu"])->nomUsu;
            array_push($nombres,$local);
        }

        //obtengo imagenes
        $imagenes=[];

        for($i=0;$i<sizeof($usuarios);$i++) {
            $local=usuarios::find($usuarios[$i]["pivot"]["idUsu"])->imagenUsu;
            array_push($imagenes,$local);
        }

        //fin de usuarios de un grupo
        return view("grupos/index",["nombreGrupo"=>$r->nomGrup,"miembros"=>$nombres,"imagenes"=>$imagenes]);
    }
}
