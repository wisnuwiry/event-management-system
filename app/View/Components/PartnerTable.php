<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PartnerTable extends Component
{
    public $partners;

    public function __construct($partners)
    {
        $this->partners = $partners;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partner-table');
    }
}
