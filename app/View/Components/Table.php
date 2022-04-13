<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public array $columns;

    public mixed $elements;

    /**
     * Table constructor.
     * @param array $columns
     * @param mixed $elements
     */
    public function __construct(array $columns, mixed $elements)
    {
        $this->columns = $columns;
        $this->elements = $elements;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string|Closure
     */
    public function render(): View|string|Closure
    {
        return view('components.table');
    }
}
