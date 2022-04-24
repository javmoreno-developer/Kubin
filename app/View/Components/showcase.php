<?php

namespace App\View\Components;

use Illuminate\View\Component;

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
    public $svg="h";

    public function __construct($titulo,$descripcion,$autor,$number,$svg)
    {
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->autor=$autor;
        $this->number=$number;
        $this->svg=$svg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.showcase');
    }
}
