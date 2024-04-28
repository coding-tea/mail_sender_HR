<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class user-menu extends Component
{
    public $menu;

    public function __construct()
    {
        $this->menu = [
            [
                "icon" => "",
                "title" => "",
                "submenu" = [
                    
                ],
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.user-menu');
    }
}
