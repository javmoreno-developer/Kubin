<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use App\Models\categorias;
use Illuminate\Support\Facades\Auth;

class categoriaController extends Controller
{
    function cargar() {
        
        $usuario=usuarios::find(Auth::user()->idUsu);
        $glob=$usuario->categorias()->get();
        $categorias=[];
        foreach($glob as $item) {
            array_push($categorias,($item->idCat . "," . $item->nomCat));
        }
        return $categorias;
    }

    function add() {
        $hoy = getdate();
        $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];
        //apuntamos en la tabla categorias
        $cat=new categorias;
        $cat->nomCat=$_POST['datos']["name"];
        $cat->descCat=$_POST['datos']["desc"];
        $cat->created_at=$hoy;
        $cat->updated_at=$hoy;
        $cat->save();
        //apuntamos en la tabla usuarios_has_categorias
        $usuario=usuarios::find(Auth::user()->idUsu);
        $glob=$usuario->categorias()->attach($cat->idCat);
        $this->cargar();
    }
}

