<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
     public function __construct()
     {
         $this->authorizeResource(User::class,'user');
     }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make(($validated['password']));

        $user = User::create($validated);
        $user->assignRole($validated['role'] ?: 'user');

        if(Auth::user()->hasRole('admin')) {
            Session::flash('message', 'User created successfully');
            return to_route('users.index');
        }
        else{
            return to_route('dashboard');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        $user->roles()->sync($validated['role']);

        session()->flash('message', 'User updated successfully');
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        session()->flash('message', 'User deleted successfully');
        return to_route('users.index');
    }
}
