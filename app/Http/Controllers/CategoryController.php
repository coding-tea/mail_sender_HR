<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as ModelRequest;
use App\Imports\CategoryImport;
use App\Models\Category;
use App\Models\Category as Model;
use Domain\Services\CategoryService;
use Domain\DTOs\CategoryDto as Dto;

use App\View\Components\breadcrumb_item;
use App\Exports\DataExport;
use App\Exports\ModelExport;
use App\View\Components\Datatable\Head;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public $route;
    public $folder;

    public function __construct(
        public CategoryService $service,
    ) {
        $this->route = "email";
        $this->folder = "email";
    }

    public function index()
    {
        $breadcrumb = [
            new breadcrumb_item(title: "Emails", route: "$this->route.index", current_page: true),
        ];

        $queryBuilder = Category::paginate(10);

        $heads = [
            new Head("name"),
            new Head("type"),
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
        return view("pages." . $this->folder . "create");
    }

    public function store(ModelRequest $ModelRequest)
    {
        $user = $this->service->store(
            Dto::fromRequest($ModelRequest)
        );

        return redirect()->route($this->route . ".show", $user->id);
    }

    public function update(Category $category, ModelRequest $ModelRequest)
    {
        $this->service->update(
            $category,
            Dto::fromRequest($ModelRequest)
        );

        return redirect()->route($this->route . ".index");
    }

    public function delete(Category $category)
    {
        $this->service->delete($category);

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

        Excel::import(new CategoryImport($validated['category_id']), $validated['file']);
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
            $query = Model::query()->whereIn('id', $ids)->get(); // Retrieve data from the 'User' Email based on the provided 'ids'
        } else {
            $query = Model::query()->get();
        }

        return response()->json(['path' => DataExport::path($heads, $query)]); // Returning the path as a JSON response
    }
}