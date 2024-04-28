<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tab extends Component
{
    public $id;
    public $tab;
    public function __construct(
        $id = "",
        $tab = "",
    )
    {
        $this->id = $id;
        $this->tab = $tab;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tab');
    }
}
