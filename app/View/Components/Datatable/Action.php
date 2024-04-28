<?php

namespace App\View\Components\Datatable;

class Action
{

    private $type;
    private $route;

    public function __construct(
        $type = "",
        $route = "",
    ) {
        $this->type = $type;
        $this->route = $route;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRoute()
    {
        return $this->route;
    }
}
