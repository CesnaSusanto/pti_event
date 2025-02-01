<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public $title;
    public $description;
    public $date;
    public $location;
    public $image;

    public function __construct($title, $description, $date, $location, $image)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-card');
    }
}
