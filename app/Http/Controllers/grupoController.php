<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lienzos;
use App\Models\usuarios;
use App\Models\grupos;
use App\Models\categorias;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class grupoController extends Controller
{
    public function ver($param,Request $request) {
        $r=grupos::find($param);

        //usuarios de un grupo
        //obtengo id de usuarios
        $usuarios=$r->usuarios()->get();

        $nombres=[];
        $idMiembros=[];

        //obtengo nombres
        for($i=0;$i<sizeof($usuarios);$i++) {
            $local=usuarios::find($usuarios[$i]["pivot"]["idUsu"])->nomUsu;
            $local2=usuarios::find($usuarios[$i]["pivot"]["idUsu"])->idUsu;
            array_push($nombres,$local);
            array_push($idMiembros,$local2);
        }

        //obtengo imagenes
        $imagenes=[];

        for($i=0;$i<sizeof($usuarios);$i++) {
            if(sizeof($usuarios[$i]->getMedia("avatars"))>0) {
                // $local=Auth::user()->getMedia("avatars")->first()->getUrl("thumb");
                 $local=$usuarios[$i]->getMedia("avatars")->first()->getUrl("thumb");
                 array_push($imagenes,$local);
            } else {
                $local=usuarios::find($usuarios[$i]["pivot"]["idUsu"])->imagenUsu;
                array_push($imagenes,$local);
            }
        }

        //var_dump($imagenes);


        //obtengo categorias asociadas al grupo
        $categorias=[];
        //obtengo lienzos del grupo
        $localLienzos=lienzos::where("grupLie","=",$param)->get();
        //var_dump($localLienzos);
        //obtengo los id de las cat
        $localId=[];
        $ids=[];
        foreach($localLienzos as $item) {
            $num=$item->categorias()->get();
            foreach($num as $n) {
                array_push($localId,$n->idCat);
               
            }
        }
       
       
       $localId=array_unique($localId);
        //obtengo los nombres de las categorias asociadas a esos id
        foreach($localId as $item) {
             array_push($ids,$item);
            $w=categorias::find($item)->nomCat;
            array_push($categorias,$w);
        }


        //obtengo los cuadros asociados al grupo
        $cuadros=[];
        //obtengo usuario
        $localUser=usuarios::find(Auth::user()->idUsu);
        //obtengo todos los cuadros
        $localCanvas=$localUser->lienzos()->get();
        //filtro
        foreach($localCanvas as $item) {
            if($item->grupLie==$param) {
                array_push($cuadros,$item);
            }
        }

        

         $perPage = 4; // Mostrar cantidad por página
    
         if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        
             $item = array_slice ($cuadros, ($current_page-1) * $perPage, $perPage); // $ data es la matriz a paginar
        $totals = count($cuadros);
       // echo "total cuadros:".$totals;
        $paginator =new LengthAwarePaginator($item, $totals, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        //notificaciones
        $not=$this->variacionCuadros();

        //fin de usuarios de un grupo
        return view("grupos/index",["nombreGrupo"=>$r->nomGrup,"miembros"=>$nombres,"imagenes"=>$imagenes,"cuadros"=>$paginator,"id"=>$param,"categorias"=>$categorias,"idMiembros"=>$idMiembros,"idCat"=>$ids,"not"=>$not]);
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

    public function cambiarNombre() {
        echo "cambiando nombre a: ".$_POST['datos']["variable1"];
        echo "id de grupo: ".$_POST["datos"]["variable2"];
        $grupo=grupos::find(intval($_POST["datos"]["variable2"]));
        $grupo->nomGrup=$_POST['datos']["variable1"];
        $grupo->save();
    }

    public function eliminarUsu() {
        $t=usuarios::find($_POST['datos']["variable1"]);
        $t->grupos()->detach($_POST["datos"]["variable2"]);
    }

    public function addMember($id) {
        echo "añadiendo user al grupo";
        echo "grupo: ".$id;
        /*$names=explode(",",$_POST['datos']["variable1"]);
        var_dump($names);*/
        $rep=false;
        //ver si ese usu ya esta en el grupo
        $grupo=grupos::find($id);
        $users=$grupo->usuarios()->get();

        foreach($users as $item) {
            if($item->idUsu==Auth::user()->idUsu) {
                $rep=true;
            }
        }

        if($rep==false) {
            $hoy = getdate();
            $hoy=$hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".($hoy["hours"]+2).":".$hoy["minutes"].":".$hoy["seconds"];

            $me=usuarios::find(Auth::user()->idUsu);
            $me->grupos()->attach($grupo,["created_at"=>$hoy]);
            //insertar los cuadros del grupo en el user
            $grupo=grupos::find(intval($id));
            $users=$grupo->usuarios()->get();
            $lienzosGr=[];
                        
            foreach($users as $user) {
                $localL=[];
                $me=usuarios::find($user->idUsu);
                $localL=$me->lienzos()->where("grupLie",$id)->get();
                foreach($localL as $r) {
                    array_push($lienzosGr,$r->idLie);
                }
            }
            $lienzosGr=array_unique($lienzosGr);
            
            foreach($lienzosGr as $item) {
                $me=usuarios::find(Auth::user()->idUsu);
                $me->lienzos()->attach($item);
            }
        } else {
            echo "usted ya se encuentra en el grupo";
        }
        return redirect("dashboard");
    }

    public function eliminarCatGrupo() {
        $c=categorias::find($_POST["datos"]["variable1"])->delete();
    }
}
