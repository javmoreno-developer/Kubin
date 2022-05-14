<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lienzos extends Model
{
    use HasFactory;
    protected $table="lienzos";
    protected $primaryKey="idLie";
    
    
    public function usuario() {
      return $this->belongsToMany('App\Models\usuarios',"usuarios_has_lienzos","idLie","idUsu");
    }

    public function categorias() {
      return $this->belongsToMany('App\Models\categorias',"lienzos_has_categorias","idLie","idCat");
    }
}
