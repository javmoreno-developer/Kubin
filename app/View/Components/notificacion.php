<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notificacion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tipo;
    public $texto;
    public $identificador;

    public function __construct($tipo,$texto,$identificador)
    {
        $this->tipo=$tipo;
        $this->texto=$texto;
        $this->identificador=$identificador;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notificacion');
    }
}
