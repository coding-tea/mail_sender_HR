<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class datatable extends Component
{
    public $title;
    public $description;
    public $heads;
    public $actions;
    public $queryBuilder;
    public $showRoute;
    public $deleteRoute;

    public function __construct(
        $queryBuilder,
        $title = "",
        $description = "",
        $heads,
        $actions,
        $showRoute,
        $deleteRoute,
    )
    {
        $this->queryBuilder = $queryBuilder;
        $this->title = $title;
        $this->description = $description;
        $this->heads = $heads;
        $this->actions = $actions;
        $this->showRoute = $showRoute;
        $this->deleteRoute = $deleteRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable');
    }
}
