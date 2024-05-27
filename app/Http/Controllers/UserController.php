<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view("pages.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.users.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;

        $user->save();

        return redirect()
            ->route("users.index")
            ->with("responseMessage", "User " . $user->name . " has been created.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("pages.users.form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;

        $user->save();

        return redirect()
            ->route("users.index")
            ->with("responseMessage", "User " . $user->name . " has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->deleteOrFail();

        return redirect()
            ->route("users.index")
            ->with("responseMessage", "User " . $user->name . " has been deleted.");
    }
}
