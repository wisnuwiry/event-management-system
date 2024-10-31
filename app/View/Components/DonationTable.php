<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DonationTable extends Component
{
    public $donations;

    /**
     * Create a new component instance.
     */
    public function __construct($donations)
    {
        $this->donations = $donations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.donation-table');
    }
}
