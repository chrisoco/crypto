<?php

namespace App\View\Components\Forms\Input;

use Illuminate\View\Component;

class Text extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input title.
     *
     * @var string
     */
    public $title;

    /**
     * The input value.
     *
     * @var string
     */
    public $value;

    /**
     * If the input is required.
     *
     * @var boolean
     */
    public $required;

    /**
     * The input placeholder.
     *
     * @var string
     */
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $title
     * @param $value
     * @param $required
     * @param $placeholder
     */
    public function __construct($name, $title, $value, $required = 'true', $placeholder = '')
    {
        $this->name  = $name;
        $this->title = $title;
        $this->value = $value;
        $this->required = $required == 'true';
        $this->placeholder = $placeholder == '' ? $title : $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input.text');
    }
}
