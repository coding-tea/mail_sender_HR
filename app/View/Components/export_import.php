<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class export_import extends Component
{
    public $importRoute;
    public $exportRoute;


    public function __construct(
        $importRoute = "",
        $exportRoute = "",
    ) {
        $this->importRoute = $importRoute;
        $this->exportRoute = $exportRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.export_import');
    }
}
