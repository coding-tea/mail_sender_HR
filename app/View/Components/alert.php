<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    public $class;
    public function __construct(
        $class = "",
    ) {
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
