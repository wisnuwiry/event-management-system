<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JournalTable extends Component
{
    public $journals;

    public function __construct($journals)
    {
        $this->journals = $journals;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.journal-table');
    }
}
