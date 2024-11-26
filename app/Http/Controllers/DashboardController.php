<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\Item;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::with('category', 'location')->get();
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all(); 
    return view('dashboard', compact('items', 'categories', 'locations', 'users'));
    }

    public function store(Request $request)
{
    $request->validate([
        'category' => 'required|exists:categories,CategoryID',
        'quantity' => 'required|integer',
        'date_added' => 'required|date',
        'status' => 'required|string',
        'location' => 'required|exists:locations,LocationID',
        'notes' => 'nullable|string',
    ]);

    $username = session('username');

    if ($username) {
        $user = User::where('username', $username)->first();

        if (!$user) {
            dd('User not found in database');
        }

        $item = new Item();

        $item->CategoryID = $request->input('category');
        $item->Quantity = $request->input('quantity');
        $item->DateAdded = $request->input('date_added');
        $item->Status = $request->input('status');
        $item->LocationID = $request->input('location');
        $item->Notes = $request->input('notes');

        $item->userID = $user->userID;

        $item->save();

        return back();
    }
}

public function destroy($id)
{
    $item = Item::find($id);
    $item->delete();
    return redirect()->route('dashboard');
}
}
