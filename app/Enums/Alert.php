<?php

namespace App\Enums;

enum Alert : string
{
    case BLUE = "text-blue-800 rounded-lg bg-blue-50";
    case RED = "text-red-800 rounded-lg bg-red-50";
    case GREEN = "text-green-800 rounded-lg bg-green-50";
    case YELLOW = "text-yellow-800 rounded-lg";
    case GRAY = "text-gray-800 rounded-lg bg-gray-50";
}