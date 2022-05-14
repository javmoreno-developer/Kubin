<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class usuarios extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;
    protected $table="usuarios";
    protected $primaryKey="idUsu";
    //public $timestamps=false;

    public function lienzos() {
        return $this->belongsToMany('App\Models\lienzos',"usuarios_has_lienzos","idUsu","idLie");
    }

    public function grupos() {
        return $this->belongsToMany('App\Models\grupos',"usuarios_has_grupos","idUsu","idGrup");
    }

    public function categorias() {
      return $this->belongsToMany('App\Models\categorias',"usuarios_has_categorias","idUsu","idCat");
    }
}
