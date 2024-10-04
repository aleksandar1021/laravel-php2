<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryCard extends Component
{
    public  $image;
    public  $heading;
    public  $description;
    public  $category;

    public function __construct($image, $heading, $description, $category)
    {
        $this->image=$image;
        $this->heading=$heading;
        $this->description=$description;
        $this->category=$category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery-card');
    }
}
