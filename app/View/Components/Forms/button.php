<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Forms extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $type;
    public mixed $class;
    public function __construct($type="button",$classArr)
    {
        $this->type         =   $type;
        $this->class        =   $classArr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
