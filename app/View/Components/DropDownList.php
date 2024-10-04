<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropDownList extends Component
{
    /**
     * Create a new component instance.
     */

    public $options;
    public $attrText;
    public $attrValue;
    public $id;
    public $attrName;
    public $selected;
    public $label;
    public $error;
    public $hidden;
    public $noneSelected;
    public $class;

    public function __construct($options, $attrName, $attrValue='value', $id=null,$attrText='text',$selected=null, $label = null, $error=null, $hidden = 'Select', $noneSelected=null, $class=null)
    {
        $this->options = $options;
        $this->attrName = $attrName;
        $this->attrValue = $attrValue;
        $this->id = $id;
        $this->attrText = $attrText;
        $this->selected = $selected;
        $this->label = $label;
        $this->error = $error;
        $this->hidden = $hidden;
        $this->noneSelected=$noneSelected;
        $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drop-down-list');
    }
}
