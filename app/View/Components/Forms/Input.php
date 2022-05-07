<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $type;
    public string $name;
    public string $placeholder;
    public string $autocomplete;
    public mixed $maxlength;



    public function __construct(string $type="text",$name,$placeholder,$autocomplete="on",$maxlength="")
    {
        $this->type         = $type;
        $this->name         = $name;
        $this->placeholder  = $placeholder;
        $this->autocomplete = $autocomplete;
        $this->maxlength    = $maxlength;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
