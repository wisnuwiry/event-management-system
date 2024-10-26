<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RichText extends Component
{
    public $id;
    public $value;

    public function __construct($id, $value = '')
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.rich-text');
    }
}
