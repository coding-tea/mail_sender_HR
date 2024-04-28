<?php

namespace App\Enums;

enum Action: string
{
    case EDIT = "edit";
    case DELETE = 'delete';
    case ADD = "add";
    case DELETESELECTED = "deleteSelected";
    case SHOW = "show";
}
