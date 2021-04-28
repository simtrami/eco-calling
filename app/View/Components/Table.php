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
    public $columns;

    /**
     * @var array|Model
     */
    public $elements;

    /**
     * Table constructor.
     * @param array $columns
     * @param array|Model $elements
     */
    public function __construct(array $columns, $elements)
    {
        $this->columns = $columns;
        $this->elements = $elements;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
