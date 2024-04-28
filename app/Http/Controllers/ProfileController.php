<?php

namespace App\Http\Controllers;

use App\Enums\Action as EnumsAction;
use App\Http\Requests\ProfileUpdateRequest;
use App\Livewire\Datatable;
use App\Livewire\DatatableDto;
use App\Models\User;
use App\View\Components\breadcrumb_item;
use App\View\Components\Datatable\Action;
use App\View\Components\Datatable\Head;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        $breadcrumb = [
            new breadcrumb_item(title: "profile", route: "", current_page: false),
            new breadcrumb_item(title: "profile", route: "", current_page: true),
        ];

        $queryBuilder = User::paginate(2);

        $heads = [
            new Head("name"),
            new Head("email"),
        ];

        $actions = [
            "Add" => route('/c'), //add route
            "DeleteSelected" => route('/c'), //delete slected route
        ];

        $this->warning("title example", "description example");
        return view("pages.profile.edit", compact("breadcrumb", "queryBuilder", "heads", "actions"));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/dashboard');
    }
}
