<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Tag extends Component
{
    private array $tags;

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.tag',['tags'=>$this->tags]);
    }
}
