<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;
    protected $table="grupos";
    protected $primaryKey="idGrup";

    public function usuarios() {
        return $this->belongsToMany('App\Models\usuarios',"usuarios_has_grupos","idGrup","idUsu");
    }
}
