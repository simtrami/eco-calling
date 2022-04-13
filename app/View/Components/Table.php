<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var array
     */
    public array $columns;

    /**
     * @var array|Model
     */
    public array|Model $elements;

    /**
     * Table constructor.
     * @param array $columns
     * @param array|Model $elements
     */
    public function __construct(array $columns, Model|array $elements)
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
