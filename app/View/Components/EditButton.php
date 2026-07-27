<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    public $route;
    public $target;
    public $label;
    public $iconOnly;

    public function __construct(
        $route = null,
        $target = null,
        $label = 'تعديل',
        $iconOnly = true
    ) {
        $this->route = $route;
        $this->target = $target;
        $this->label = $label;
        $this->iconOnly = $iconOnly;
    }

    public function render(): View|Closure|string
    {
        return view('components.edit-button');
    }
}
