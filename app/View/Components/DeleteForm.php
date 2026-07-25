<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteForm extends Component
{
    public $route;
    public $type;

    public function __construct($route, $type)
    {
        $this->route = $route;
        $this->type = $type;
    }


    public function render(): View|Closure|string
    {
        return view('components.delete-form');
    }
}
