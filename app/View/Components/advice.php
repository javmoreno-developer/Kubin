<?php

namespace App\View\Components;

use Illuminate\View\Component;

class advice extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $titulo;
    public $mensaje;
    public $number;

    public function __construct($titulo,$mensaje,$number)
    {
        $this->titulo=$titulo;
        $this->mensaje=$mensaje;
        $this->number=$number;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.advice');
    }
}
