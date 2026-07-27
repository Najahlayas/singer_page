<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteForm extends Component
{
    public $route;
    public $type;
    public $id;
    public $label;
    public $iconOnly;

   public function __construct($route, $type, $id, $label = null, $iconOnly = true)
{
    $this->route = $route;
    $this->type = $type;
    $this->id = $id;
    $this->label = $label;
    $this->iconOnly = $iconOnly;
}
    public function render(): View|Closure|string
    {
        return view('components.delete-form');
    }
}
