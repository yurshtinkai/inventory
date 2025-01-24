<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();   
        return view('content.user', compact( 'users', ));
    }

    public function updateUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'userRole' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user = User::findOrFail($request->userID);
    $user->name = $request->name;
    $user->username = $request->username;
    $user->user_Role = $request->userRole;

    if ($request->filled('password')) {
        $user->password = $request->password;
    }

    $user->save();
    
    return redirect()->route('user');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|string|min:6|confirmed',
        'userRole' => 'required|string',
    ]);

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'user_Role' => $request->userRole,
    ]);

    return redirect()->route('user')->with('success', 'User added successfully.');
}

public function destroy($id)
{
    $user = User::find($id);
    $user->delete();
    return redirect()->route('user');
}

}
