<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cabecera extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $tutorial;
    public $showcase;
    public $github;
    public $log;

    public function __construct($title,$tutorial,$showcase,$github,$log)
    {
        $this->title=$title;
        $this->tutorial=$tutorial;
        $this->showcase=$showcase;
        $this->github=$github;
        $this->log=$log;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cabecera');
    }
}
