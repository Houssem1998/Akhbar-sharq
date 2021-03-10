<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::denies('manage-users')) { // we can use 'denies' or 'allows' method
            return redirect(route('post.index',app()->getlocale()));
        }
        $data = [
            'users' => User::all(),
        ];
        return view('admin.users.index')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($locale,$user)
    {
        //
        if (Gate::denies('edit-users')) { // we can use 'denies' or 'allows' method
            return redirect(route('admin.users.index',app()->getlocale()));
        }
        $user = User::findOrFail($user);
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user'=> $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale ,$user)
    {
        //
        $user = User::findOrFail($user);
        $user->roles()->sync($request->roles); //sync allows us to pass in an array of IDs that will be linked to the user roles
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.index',app()->getlocale());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$user)
    {
        if (Gate::denies('delete-users')) { // we can use 'denies' or 'allows' method
            return redirect(route('admin.users.index',app()->getlocale()));
        }
        $user = User::findOrFail($user);
        $roles = Role::all();
        $user->roles()->detach();//remove the roles
        $user->delete();
        return redirect()->route('admin.users.index',app()->getlocale());
    }
}
