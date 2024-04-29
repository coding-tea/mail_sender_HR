<?php

namespace App\Imports;

use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmailImport implements ToModel, WithHeadingRow
{
    use Importable;

    public $category_id;

    public function __construct(
        $category_id,
    ) {
        $this->category_id = $category_id;
    }

    public function model(array $row)
    {
        $validated = Validator::make($row, [
            "company" => 'nullable|string',
            "group" => 'nullable|string',
            "city" => 'nullable|string',
            "activity" => 'nullable|string',
            "person" => 'nullable|string',
            "function" => 'nullable|string',
            "tel" => 'nullable|string',
            "tax" => 'nullable|string',
            "gsm" => 'nullable|string',
            "email" => 'required |string',
            "address" => 'nullable|string',
        ]);

        return new Email([
            "company" => $validated->validated()["company"],
            "group" => $validated->validated()["group"],
            "city" => $validated->validated()["city"],
            "activity" => $validated->validated()["activity"],
            "person" => $validated->validated()["person"],
            "function" => $validated->validated()["function"],
            "tel" => $validated->validated()["tel"],
            "tax" => $validated->validated()["tax"],
            "gsm" => $validated->validated()["gsm"],
            "email" => $validated->validated()["email"],
            "address" => $validated->validated()["address"],
            "category_id" => $this->category_id,
            "user_id" => Auth::id() ,
        ]);
    }
}
