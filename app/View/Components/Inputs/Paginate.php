<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Paginate extends Component
{
    /**
     * The current page number.
     *
     * @var int
     */
    public $page;

    /**
     * The last page number.
     *
     * @var int
     */
    public $last;

    /**
     * Create a new component instance.
     *
     * @param int $page
     * @param int $last
     */
    public function __construct(int $page, int $last)
    {
        $this->page = $page;
        $this->last = $last;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.paginate');
    }
}
