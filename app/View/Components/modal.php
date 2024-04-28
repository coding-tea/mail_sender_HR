<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public $id;
    public $title;
    public $form;
    public function __construct(
        $id = "",
        $title = "",
        $form = "",
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->form = $form;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
