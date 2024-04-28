<?php

namespace App\View\Components\Datatable;

class Head
{

    private $title;
    private $type;

    public function __construct(
        String $title,
        // $type,
    ) {
        $this->title = $title;
        // $this->type = $type;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
