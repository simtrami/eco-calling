<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sponsors extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string|Closure
     */
    public function render(): View|string|Closure
    {
        return view('components.sponsors');
    }
}
