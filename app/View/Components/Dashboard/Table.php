<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var array
     */
    public $items;

    /**
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param array|object $items
     * @param string $type
     */
    public function __construct($items, string $type)
    {
        $this->items = $items;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.dashboard.table');
    }
}
