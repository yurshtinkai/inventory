<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
class AuthController extends Controller
{
    private $users = [
        'admin' => 'adminpass', 
        'user1' => 'user1pass',
        'user2' => 'user2pass',
    ];

    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required|min:6',
    ]);

    $this->users = [
        'admin' => 'adminpass',  
        'user1' => 'user1pass',
        'user2' => 'user2pass',
    ];

    if (!array_key_exists($request->username, $this->users)) {
        return response()->json([
            'success' => false,
            'errors' => ['username' => ['Incorrect username.']]
        ], 422);
    }

    if ($this->users[$request->username] !== $request->password) {
        return response()->json([
            'success' => false,
            'errors' => ['password' => ['Incorrect password.']]
        ], 422);
    }

    session(['username' => $request->username]);

    return response()->json([
        'success' => true,
    ]);
    
}

    public function logout()
    {
        return redirect()->route('index');
    }
}
