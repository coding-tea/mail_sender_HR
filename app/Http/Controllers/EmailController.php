<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Exports\ModelExport;
use App\Http\Requests\emailRequest as ModelRequest;
use App\Imports\EmailImport;
use App\Models\Email;
use App\View\Components\breadcrumb_item;
use App\View\Components\Datatable\Head;
use Domain\DTOs\EmailDto as Dto;
use Domain\Services\EmailService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmailController extends Controller
{

    public $route;
    public $folder;

    public function __construct(
        public EmailService $service,
    ) {
        $this->route = "email";
        $this->folder = "email";
    }

    public function index()
    {
        $breadcrumb = [
            new breadcrumb_item(title: "Emails", route: "$this->route.index", current_page: true),
        ];

        $queryBuilder = Email::paginate(10);

        $heads = [
            new Head("company"),
            new Head("group"),
            new Head("city"),
            new Head("activity"),
            new Head("person"),
            new Head("function"),
            new Head("tel"),
            new Head("tax"),
            new Head("fax"),
            new Head("gsm"),
            new Head("email"),
            new Head("address"),
        ];

        $actions = [
            "Add" => route($this->route . ".create"), //add route
            "DeleteSelected" => route($this->route . ".delete"), //delete slected route
        ];
        return view("pages." . $this->folder . ".index", [
            "breadcrumb" => $breadcrumb,
            "queryBuilder" => $queryBuilder,
            "heads" => $heads,
            "actions" => $actions,
        ]);
    }

    public function create()
    {
        $breadcrumb = [
            new breadcrumb_item(title: "Emails", route: "$this->route.index", current_page: false),
            new breadcrumb_item(title: "create", route: "$this->route.create", current_page: true),
        ];
        return view("pages." . $this->folder . ".create", [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(ModelRequest $ModelRequest)
    {
        $user = $this->service->store(
            Dto::fromRequest($ModelRequest)
        );

        return redirect()->route($this->route . ".show", $user->id);
    }

    public function update(Email $email, ModelRequest $ModelRequest)
    {
        $this->service->update(
            $email,
            Dto::fromRequest($ModelRequest)
        );

        return redirect()->route($this->route . ".index");
    }

    public function delete(Email $email)
    {
        $this->service->delete($email);

        return redirect()->route($this->route . ".index");
    }

    public function destroy($arr)
    {
        $this->service->deleteArrayOfIds($arr);

        return redirect()->route($this->route . ".index");
    }

    public  function download()
    {
        $export = new ModelExport([
            ['company', 'group', 'city', 'activity', 'person', 'function',  'tel',  'tax',  'fax', 'gsm', 'email', 'address']
        ]);
        return Excel::download($export, 'email excel.xlsx');
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|max:50000|mimes:xlsx',
            'category_id' => 'required',
        ]);

        Excel::import(new EmailImport($validated['category_id']), $validated['file']);
        $this->success("data Imported Successfuly", "Email data Imported Successfuly");
        return redirect()->back();
    }

    public function export(Request $request)
    {
        $ids = $request['ids'] ?? []; // Retrieve 'ids' from the incoming request or set an empty array if 'ids' are not available

        $heads = [
            new Head("company"),
            new Head("group"),
            new Head("city"),
            new Head("activity"),
            new Head("person"),
            new Head("function"),
            new Head("tel"),
            new Head("tax"),
            new Head("fax"),
            new Head("gsm"),
            new Head("email"),
            new Head("address"),
        ];
        if (count($ids) > 0) {
            $query = Email::query()->whereIn('id', $ids)->get(); // Retrieve data from the 'User' Email based on the provided 'ids'
        } else {
            $query = Email::query()->get();
        }

        return response()->json(['path' => DataExport::path($heads, $query)]); // Returning the path as a JSON response
    }
}
