<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $route;
    public $image;
    public $title;
    public $description;
    public $btnText;

    /**
     * Create a new component instance.
     *
     * @param string $route
     * @param string $image
     * @param string $title
     * @param string $description
     * @param string $btnText
     */
    public function __construct($route, $image, $title, $description, $btnText)
    {
        $this->route = $route;
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->btnText = $btnText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
