<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Checkbox extends Component
{
  
    public string $name;
    public string $label;
    public bool $checked;

    /**
     * Create a new component instance.
     *
     * @param $method
     * @return void
     */
    public function __construct(string $name, string $label = '', bool $checked = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('template.components.form.checkbox');
    }
}