<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $searchValue;

    public function __construct($searchValue = '')
    {
        $this->searchValue = $searchValue;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
