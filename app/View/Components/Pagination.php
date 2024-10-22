<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     */
    public $currentPage;
    public $totalPages;

    public function __construct($currentPage, $totalPages)
    {
        $this->currentPage = $currentPage;
        $this->totalPages = $totalPages;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
