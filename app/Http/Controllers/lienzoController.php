<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use Illuminate\Support\Facades\Auth;

class lienzoController extends Controller
{
    public function subida(Request $req) {
        echo "Hola";
       var_dump($_POST);

           if(Auth::user()!=null) {
            if($_POST["id"]==0) {
                $name=implode($_POST["datos"]['variable1']);
                $name=htmlentities($name);
                $nombre=$_POST["nombre"];
                //apunto en la tabla lienzo
                $modelo=new lienzos;
                $modelo->pathLie="$name";
                $modelo->nomLie=$nombre;
                $modelo->save();

                //fecha actual
                $hoy = getdate();
                print_r($hoy);
                $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];

                echo $hoy;

                //apunto en la tabla lienzo-usuario
                $me=usuarios::find(Auth::user()->idUsu);
                $me->lienzos()->attach($modelo->idLie,["created_at"=>"$hoy","updated_at"=>"$hoy"]);
               
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
                    return redirect()->route("dashboard");
                }
            } else {
                echo "no logueado";
                var_dump($_GET);
            }
        
        

    }

    public function dashboard() {
        //nombre usuario
        $nombre=Auth::user()->nomUsu;
        //cuadros usuario
        $cuadros=[];
        $me=usuarios::find(Auth::user()->idUsu);
        $me->lienzos()->get();
        $cuadros=$me->lienzos()->withPivot("created_at","updated_at")->get();
        $numeroFilas=sizeof($cuadros);
        $imagen=Auth::user()->imagenUsu;

        return view("dashboard/index",["nomUsu"=>$nombre,"cuadros"=>$cuadros,"numeroFilas"=>$numeroFilas,"imagen"=>$imagen]);
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
    }

    public function obtenerDatos() {
        //echo "Hola obteniendo datos";
        //var_dump($_POST["datos"]["variable1"]);
        $id=$_POST["datos"]["variable1"];
        $lienzo=lienzos::find($id);
        return [html_entity_decode($lienzo->pathLie),$lienzo->nomLie];
    }
}

