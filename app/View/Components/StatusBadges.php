<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBadges extends Component
{
    public $status, $type, $value;
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function __construct($type)
    {
        dd($type);
        if ($type) {
            return  $this->type = $type;
        }
    }

    public function render()
    {
        return view('components.status-badges');
    }
}