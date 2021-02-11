<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Label extends Component
{
  
    /**
     * The name of field to which label is assigned 
     *
     * @var string
     */
    // public string $fieldName;

    /**
     * Create a new component instance.
     *
     * @param $method
     * @return void
     */
    public function __construct()
    {
        // $this->fieldName = $fieldName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('template.components.form.label');
    }
}