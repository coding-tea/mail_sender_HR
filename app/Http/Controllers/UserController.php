<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use src\Domain\DTOs\UserDto;
use src\Domain\Services\UserService;

class UserController extends Controller
{

    public $route;
    public $folder;

    public function __construct(
        public UserService $service,
    ) {
        $this->route = "";
        $this->folder = "";
    }

    public function index()
    {
        return view("pages." . $this->folder . ".index");
    }

    public function create()
    {
        return view("pages." . $this->folder . "create");
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->store(
            UserDto::fromRequest($request)
        );

        return redirect()->route($this->route . ".show", $user->id);
    }

    public function update(User $user, UserRequest $request)
    {
        $this->service->update(
            $user,
            UserDto::fromRequest($request)
        );

        return redirect()->route($this->route . ".index");
    }

    public function delete(User $user)
    {
        $this->service->delete($user);

        return redirect()->route($this->route . ".index");
    }

    public function destroy($arr)
    {
        $this->service->deleteArrayOfIds($arr);

        return redirect()->route($this->route . ".index");
    }
}
