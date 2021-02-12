<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Multiselect extends Component
{
  
    public string $name;
    public string $label;
    public array $options;

    /**
     * Create a new component instance.
     *
     * @param $method
     * @return void
     */
    public function __construct(array $options = array(), string $label = '', string $name)
    {
        $this->options = $options;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('template.components.form.multiselect');
    }
}