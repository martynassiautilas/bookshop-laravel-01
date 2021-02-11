<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * The form method.
     *
     * @var string
     */
    public string $method;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing
     *
     * @var bool
     */
    public bool $spoofMethod = false;
    
    /**
     * Create a new component instance.
     *
     * @param string $method
     * @return void
     */
    public function __construct(string $method = 'POST')
    {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('template.components.form.form');
    }
}