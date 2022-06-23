<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UserUpdateRequest;
use JetBrains\PhpStorm\Immutable;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->except(Auth::id());


        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();
        //$users = User::all()->except(Auth::id());
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'role_id' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
        ]);
        //dd($validated);
        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => 'nullable',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('admin.users.index')->with('message', 'New User Added.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return to_route('admin.users.index')->with('message', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('message', 'User deleted.');
    }

    public function show()
    {
        return view('admin.users.import');
    }

    public function exstore(Request $request)
    {
        $request->validate([
            'file' => ['required']
           ]);

        $file = $request->file('file')->store('ImportedExcelFile');

        //For normal import
        //Excel::import(new UsersImport,$file);

        //Access Error
        $import = new UsersImport;
        $import->import($file);
        //$import->queue($file);

        //dd($import->errors());
        //dd($import->failures());

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        // Using Importable
        //(new UsersImport)->import($file);
        return to_route('admin.users.index')->with('message', 'Excel File Import SuccessFully');


        $file = $request->file('file')->store('ImportedExcelFile');

        //For normal import
        //Excel::import(new UsersImport,$file);

        //Access Error
        $import = new UsersImport;
        $import->import($file);
        //$import->queue($file);

        //dd($import->errors());
        //dd($import->failures());

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        // Using Importable
        //(new UsersImport)->import($file);
        return to_route('admin.users.index')->with('message', 'Excel File Import SuccessFully');
    }
}
