<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBadges extends Component
{
    public $status;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = null)
    {
        //
        $this->status = $value;
        switch ($value) {
            case 'active' ||  'ACTIVE':
                $this->status = 'bg-success-700 hover:bg-success-900 text-white';
                break;
            default:
                $this->status = 'bg-base-100';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-badges');
    }
}