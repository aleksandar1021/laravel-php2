<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextField extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $placeholder;
    public $id;
    public $type;
    public $hint;
    public $error;
    public  $nameAttr;
    public $inputValue;
    public $class;
    public function __construct($label = null, $placeholder=null, $id=null, $type="text", $hint=null, $error=null, $nameAttr=null, $inputValue=null, $class="")
    {
        $this->label=$label;
        $this->placeholder=$placeholder;
        $this->id=$id;
        $this->type=$type;
        $this->hint=$hint;
        $this->error=$error;
        $this->nameAttr=$nameAttr;
        $this->inputValue=$inputValue;
        $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-field');
    }
}
