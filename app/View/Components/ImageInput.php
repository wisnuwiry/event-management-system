<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageInput extends Component
{
    public $id;
    public $value;
    public $currentImage;

    public function __construct($id, $value = '', $currentImage = false)
    {
        $this->id = $id;
        $this->value = $value;
        $this->currentImage = $currentImage;
    }

    public function render()
    {
        return view('components.image-input');
    }
}
