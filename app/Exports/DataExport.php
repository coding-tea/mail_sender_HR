<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class DataExport implements FromView
{

    public function __construct(public array $heads , public $query)
    {
    }
    public function view(): View
    {
        return view('exports.model', [
            'model' => $this->query ,
            'heads' => $this->heads
        ]);
    }

    public static function path(array $heads ,$query): string
    {
        $uuid = Str::uuid()->toString(); // Generate a UUID (Universally Unique Identifier) and convert it to a string
        $filename = $uuid.".xlsx" ; // Create a unique filename by concatenating the UUID with the '.xlsx' extension
        Excel::store(new self($heads , $query),"export/$filename"); // Store the Excel file using laravel-excel 'store' method with DataExport, $heads, and $query
        return route('download.files',$filename); // Generating the URL path for downloading the file
    }

}
