<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class Alert extends Component
{
    public object $user;
    public string $message;
    public string $type;
    public bool $hasError = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user,string $message,string $type)
    {
        $this->user = $user;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        /*return function(array $data) {
            echo "<pre>";
            print_r($data);
            exit();
        };*/
        return view('components.alert');
    }

    public function isSelected():string
    {
        return "I have used isSelected()";
    }
}
