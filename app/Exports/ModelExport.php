<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ModelExport implements FromArray
{
    public function __construct(protected array $export)
    {
    }

    public function array(): array
    {
        return $this->export;
    }
}
