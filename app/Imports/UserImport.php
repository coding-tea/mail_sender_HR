<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlocImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        $validated = Validator::make($row, [
            "name" => 'required|string',
            "email" => 'string',
        ]);


        return new User([
            "name" => $validated->validated()["name"],
            "email" => $validated->validated()["email"],
        ]);
    }
}
