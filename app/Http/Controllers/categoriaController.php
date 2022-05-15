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
        $categorias=[];
        //echo ($_POST['datos']["variable1"] . "+" . $_POST['datos']["variable2"]);
        
        if(isset($_POST['datos']["variable1"])) {
            if($_POST['datos']["variable1"]!="null") {
                $lienzoL=lienzos::find(intval($_POST['datos']["variable1"]));
                $glob2=$lienzoL->categorias()->get();
                 foreach($glob2 as $item) {
                    array_push($categorias,($item->idCat . "," . $item->nomCat));
                }
            }
        } 
        $usuario=usuarios::find(Auth::user()->idUsu);
        $glob=$usuario->categorias()->get();
        
        foreach($glob as $item) {
            array_push($categorias,($item->idCat . "," . $item->nomCat));
        }
        
        if(isset($_POST['datos']["variable2"])) {
            if($_POST['datos']["variable2"]!="null") {
                //echo "existo<br>";
                //$categorias=[];
                $local2=$this->obtenerCategoriaGrupo(intval($_POST['datos']["variable2"]));
                foreach($local2 as $t) {
                    array_push($categorias, $t);
                }
                //$categorias=$categorias+$local2;
            }
        }
        
        $categorias=array_unique($categorias);
        //var_dump($categorias);
        //var_dump($local2);

        return $categorias;
    }

    public function obtenerCategoriaGrupo($param) {
         $categorias=[];
        //obtengo lienzos del grupo
        $localLienzos=lienzos::where("grupLie","=",$param)->get();
        //var_dump($localLienzos);
        //obtengo los id de las cat
        $localId=[];
        foreach($localLienzos as $item) {
            $num=$item->categorias()->get();
            foreach($num as $n) {
                array_push($localId,$n->idCat);
               
            }
        }
       
       
       $localId=array_unique($localId);
        //obtengo los nombres de las categorias asociadas a esos id
        foreach($localId as $item) {
            $w=categorias::find($item)->nomCat;
            $q=categorias::find($item)->idCat;
            array_push($categorias,($q . "," .$w));
            //array_push($categorias,($item->idCat . "," . $item->nomCat));
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
        //$this->cargar();
    }
}

