<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class export_import extends Component
{
    public $importRoute;
    public $exportRoute;
    public $downloadRoute;


    public function __construct(
        $importRoute = "",
        $exportRoute = "",
        $downloadRoute = "",
    ) {
        $this->importRoute = $importRoute;
        $this->exportRoute = $exportRoute;
        $this->downloadRoute = $downloadRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.export_import');
    }
}
