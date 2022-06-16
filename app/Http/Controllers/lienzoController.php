<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use App\Models\categorias;
use App\Models\grupos;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class lienzoController extends Controller
{

    public function subida(Request $req) {
         $dateTime = date('Y-m-d H:i:s');
         echo "subida";
        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('m-d-Y H:i:s');
        
            if($_POST["id"]=="null") {
                //notificacion
                session(['incremento' => "true"]);
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
                if($_POST["gr"]!="null") {
                    $modelo->grupLie=$_POST['gr'];
                }
                $modelo->save();
                $modelo->touch();
                
                echo "fechita:".now()->toDateTimeString();
                if($_POST["gr"]=="null") {
                    //apunto en la tabla lienzo-usuario
                    $me=usuarios::find(Auth::user()->idUsu);
                    //$me->lienzos()->attach($modelo->idLie,["created_at"=>"$hoy","updated_at"=>"$hoy"]);
                    $me->lienzos()->attach($modelo->idLie);
                } else {
                    $grupo=grupos::find(intval($_POST['gr']));
                    $users=$grupo->usuarios()->get();
                    echo "entro en gr";
                    foreach($users as $user) {
                        $me=usuarios::find($user->idUsu);
                        $me->lienzos()->attach($modelo->idLie);
                    }
                }
               
               //apunto en la tabla lienzos_categorias
                $lienzo=lienzos::find($modelo->idLie);
                 /*foreach($_POST['datos']["variable2"] as $item) {
                    $lienzo->categorias()->attach(intval($item));
                }*/
                    $lienzo->categorias()->attach(intval($_POST['datos']["variable2"]));

               // return redirect()->route("dashboard");
                } else {
                     //notificacion
                    session(['edit' => "true"]);
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
                    /*foreach($_POST['datos']["variable2"] as $item) {
                        $lienzo->categorias()->attach(intval($item));
                    }*/
                     $lienzo->categorias()->attach(intval($_POST['datos']["variable2"]));
                    //return redirect()->route("dashboard");
                    
                    
                }
        
          
        
        
        //var_dump($_POST["datos"]["variable2"]);

    }

    public function dashboard($skip=0,Request $req) {
        $dateTime = date('Y-m-d H:i:s');
        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('m-d-Y H:i:s');

        //nombre usuario
        $nombre=Auth::user()->nomUsu;

        //cuadros usuario
        $cuadros=[];
        $me=usuarios::find(Auth::user()->idUsu);
        //$me->lienzos()->get();
        $cuadros=$me->lienzosD()->paginate(4);
        
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

        //notificaciones
        $not=$this->variacionCuadros();

      
       return view("dashboard/index",["nomUsu"=>$nombre,"cuadros"=>$cuadros,"imagen"=>$imagen,"fecha"=>$fecha,"grupo"=>$grupo,"not"=>$not]);
    }

    public function variacionCuadros() {
        //return session()->has('incremento');
        if(session()->has('incremento')) {
            session()->forget('incremento');
            return "mayor";

        }

        if(session()->has("grupoCreado")) {
            session()->forget('grupoCreado');
            return "grupoCreado";
        }
        
        if(session()->has("edit")) {
            session()->forget('edit');
            return "edit";
        }
        if(session()->has('decremento')) {
            session()->forget('decremento');
            return "menor";
        } else {
            return "igual";
        }
    }

    public function editar(Request $req) {
        $lienzo=lienzos::find($req->input("id"));
        $nombre=$lienzo["nomLie"];
        $lienzo=$lienzo["pathLie"];
        //echo $lienzo;
        //echo $req->input("id");
        if(isset($_GET['grupo'])) {
             $grupo=$_GET['grupo'];
             $nomGru=grupos::find($grupo)->nomGrup;
             
            return view("tablero/index",["id"=>$req->input("id"),"path"=>$lienzo,"nombre"=>$nombre,"grupo"=>$_GET['grupo'],"nombreGr"=>$nomGru]);
        }
        return view("tablero/index",["id"=>$req->input("id"),"path"=>$lienzo,"nombre"=>$nombre]);
    }

    public function crearLienzo() {
        if(isset($_POST["grupo"])) {
            //echo $_POST["grupo"];
            $categoria=$this->obtenerCategoriaGrupo($_POST['grupo']);
            //var_dump($categoria);
            $gr=grupos::find($_POST['grupo'])->nomGrup;
            return view("tablero/index",["grupo"=>$_POST['grupo'],"categoriasGr"=>$categoria,"nombreGr"=>$gr]);
        }
        return view("tablero/index");
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
            array_push($categorias,$w);
        }
        return $categorias;
    }
    
    public function borrarLienzo($id) {
        //notificacion
         session(['decremento' => "true"]);
         //fin notificacion
        $l=lienzos::find($id);

        $gr=$l->grupLie;
        echo $gr;
        if($gr!=null) {
            $id=$gr;
            $l->delete();
            return redirect()->route("grupo",["id"=>$id]);
        } else {
            $l->delete();
            return redirect()->route("dashboard");
        }
    }

    public function borrarLienzoDrag($id) {
        echo $id;
          $l=lienzos::find(intval($id));
          //notificacion
         session(['decremento' => "true"]);
        //  echo $l;
          $l->delete();
    }

    public function obtenerDatos() {
        //echo "Hola obteniendo datos";
        //var_dump($_POST["datos"]["variable1"]);
        $id=$_POST["datos"]["variable1"];
        $lienzo=lienzos::find($id);
        return [html_entity_decode($lienzo->pathLie),$lienzo->nomLie];
    }
}

