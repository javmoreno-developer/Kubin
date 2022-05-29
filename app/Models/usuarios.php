<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class usuarios extends Model implements AuthenticatableContract,HasMedia
{
    use HasFactory,Authenticatable,InteractsWithMedia;
    protected $table="usuarios";
    protected $primaryKey="idUsu";
    //public $timestamps=false;

    public function lienzos() {
        return $this->belongsToMany('App\Models\lienzos',"usuarios_has_lienzos","idUsu","idLie");
    }

    public function lienzosD() {
        return $this->belongsToMany('App\Models\lienzos',"usuarios_has_lienzos","idUsu","idLie")->where('grupLie', '=', null); 
    }
    public function grupos() {
        return $this->belongsToMany('App\Models\grupos',"usuarios_has_grupos","idUsu","idGrup");
    }

    public function categorias() {
      return $this->belongsToMany('App\Models\categorias',"usuarios_has_categorias","idUsu","idCat");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
               ->width(468)
               ->height(432)
               ->sharpen(10)
               ->nonOptimized();
    }
}
