<?php

namespace App\View\Components\Partials; // Matches the folder: Partials

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

// Class name must be CamelCase and have NO dots
class VinylCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // This should point to your blade file in resources/views/components/partials/vinyl-card.blade.php
        return view('components.partials.vinyl-card');
    }
}
