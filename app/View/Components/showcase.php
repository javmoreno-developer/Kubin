<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\lienzos;
use App\Models\usuarios;

class showcase extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $titulo;
    public $descripcion;
    public $autor;
    public $number;
    public $svg=1;
    public function __construct($descripcion,$number,$svg)
    {
        $this->descripcion=$descripcion;
        $this->number=$number;
        $this->svg=lienzos::find($svg)->pathLie;
        $this->autor=$this->obtenAut($svg);
        $this->titulo=$this->obtenTit($svg);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function obtenAut($param) {
        $r=lienzos::find($param);
        $a=$r->usuario()->get();
        $a=$a[0]->pivot->idUsu;
        $resul=usuarios::find($a)->nomUsu;
        return $resul;
    }

    public function obtenTit($param) {
        $r=lienzos::find($param);
        return $r->nomLie;
    }

    public function render()
    {
        return view('components.showcase');
    }
}
