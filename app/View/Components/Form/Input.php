<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
  
    public string $name;
    public string $label;
    public string $type;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param $method
     * @return void
     */
    public function __construct(string $name, string $label = '', string $type = 'text')
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('template.components.form.input');
    }
}