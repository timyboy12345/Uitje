<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListGroup extends Component
{
    public $items;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $items
     * @param $type
     */
    public function __construct($items, $type)
    {
        //
        $this->items = $items;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-group');
    }
}
