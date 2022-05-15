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



        //obtengo categorias asociadas al grupo
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
        $paginator =new LengthAwarePaginator($item, $totals, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        //fin de usuarios de un grupo
        return view("grupos/index",["nombreGrupo"=>$r->nomGrup,"miembros"=>$nombres,"imagenes"=>$imagenes,"cuadros"=>$paginator,"id"=>$param,"categorias"=>$categorias]);
    }


    public function cambiarNombre() {
        echo "cambiando nombre a ".$_POST['datos']["variable1"];
    }
}
