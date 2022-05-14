<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use App\Models\categorias;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class lienzoController extends Controller
{
    public function subida(Request $req) {
         $dateTime = date('Y-m-d H:i:s');
        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('m-d-Y H:i:s');

           if(Auth::user()!=null) {
            if($_POST["id"]==0) {
                $name=implode($_POST["datos"]['variable1']);
                $name=htmlentities($name);
                $nombre=$_POST["nombre"];
                //fecha actual
                $hoy = getdate();
                print_r($hoy);
                $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];

                echo $hoy;

                //apunto en la tabla lienzo
                $modelo=new lienzos;
                $modelo->pathLie="$name";
                $modelo->nomLie=$nombre;
                $modelo->created_at=$hoy;
                $modelo->updated_at=$hoy;
                $modelo->save();
                $modelo->touch();
                
                echo "fechita:".now()->toDateTimeString();
                //apunto en la tabla lienzo-usuario
                $me=usuarios::find(Auth::user()->idUsu);
                //$me->lienzos()->attach($modelo->idLie,["created_at"=>"$hoy","updated_at"=>"$hoy"]);
                $me->lienzos()->attach($modelo->idLie);
               
               //apunto en la tabla lienzos_categorias
                $lienzo=lienzos::find($modelo->idLie);
                 foreach($_POST['datos']["variable2"] as $item) {
                    $lienzo->categorias()->attach(intval($item));
                }
                return redirect()->route("dashboard");
                } else {
                    echo "actualizando";
                    echo $_POST['id'];
                    $nombre=$_POST["nombre"];
                    $name=implode($_POST["datos"]['variable1']);
                    $name=htmlentities($name);
                    $modelo=lienzos::find($_POST['id']);
                    $modelo->pathLie="$name";
                    $modelo->nomLie=$nombre;
                    $modelo->save();
                    $modelo->touch();

                    //actualizando categoria
                    $lienzo=lienzos::find($modelo->idLie);
                    $lienzo->categorias()->detach();
                    foreach($_POST['datos']["variable2"] as $item) {
                        $lienzo->categorias()->attach(intval($item));
                    }
                    return redirect()->route("dashboard");
                    
                    
                }
            } else {
                echo "no logueado";
                var_dump($_GET);
            }
        
        
        //var_dump($_POST["datos"]["variable2"]);

    }

    public function dashboard($skip=0) {
        $dateTime = date('Y-m-d H:i:s');
        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('m-d-Y H:i:s');

        //nombre usuario
        $nombre=Auth::user()->nomUsu;

        //cuadros usuario
        $cuadros=[];
        $me=usuarios::find(Auth::user()->idUsu);
        $me->lienzos()->get();
        $cuadros=$me->lienzos()->paginate(4);
        
        //fecha
        $me->updated_at=Carbon::now();
        $me->save();
        $fecha=$me->updated_at;

        //imagen
        $imagen=Auth::user()->imagenUsu;
        $tt=now()->toDateTimeString();

        //grupos
        $me=usuarios::find(Auth::user()->idUsu);
        $grupo=$me->grupos()->get();

        return view("dashboard/index",["nomUsu"=>$nombre,"cuadros"=>$cuadros,"imagen"=>$imagen,"fecha"=>$fecha,"grupo"=>$grupo]);
    }

    public function editar(Request $req) {
        $lienzo=lienzos::find($req->input("id"));
        $nombre=$lienzo["nomLie"];
        $lienzo=$lienzo["pathLie"];
        //echo $lienzo;
        //echo $req->input("id");
        
        return view("tablero/index",["id"=>$req->input("id"),"path"=>$lienzo,"nombre"=>$nombre]);
    }

    public function crearLienzo() {
        return view("tablero/index");
    }

    public function borrarLienzo($id) {
        $l=lienzos::find($id)->delete();
        return redirect()->route("dashboard");
    }

    public function obtenerDatos() {
        //echo "Hola obteniendo datos";
        //var_dump($_POST["datos"]["variable1"]);
        $id=$_POST["datos"]["variable1"];
        $lienzo=lienzos::find($id);
        return [html_entity_decode($lienzo->pathLie),$lienzo->nomLie];
    }
}

