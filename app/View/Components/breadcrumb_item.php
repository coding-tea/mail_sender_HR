<?php

namespace App\View\Components;

use PhpParser\Node\Expr\Cast\Bool_;

class breadcrumb_item
{
    public $current_page;
    public $route;
    public $title;

    public function __construct(
        bool $current_page = false,
        String $route = "",
        String $title,
    )
    {
        $this->current_page = $current_page;
        $this->route = $route;
        $this->title = $title;
    }
}
