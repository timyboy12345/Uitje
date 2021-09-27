<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class FormInput extends Component
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string|null
     */
    public $value;
    /**
     * @var string|null
     */
    public $description;
    /**
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $label
     * @param string|null $value
     * @param string|null $description
     * @param string $type
     */
    public function __construct(string $id, string $label, ?string $value, ?string $description = null, string $type = 'text')
    {
        //
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
        $this->description = $description;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.form-input');
    }
}
