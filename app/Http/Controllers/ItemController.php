<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category', 'location')->get();
        $categories = Category::all();
        $locations = Location::all();
    return view('content.item', compact('items', 'categories', 'locations'));
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
    return redirect()->route('item');
}
public function edit(Item $item)
{
    $categories = Category::all();
    $locations = Location::all();
    return response()->json([
        'item' => $item,
        'categories' => $categories,
        'locations' => $locations,
    ]);
}

public function update(Request $request, Item $item)
{
    $data = $request->validate([
        'category' => 'required|exists:categories,CategoryID',
        'quantity' => 'required|integer',
        'date_added' => 'required|date',
        'status' => 'required|string',
        'location' => 'required|exists:locations,LocationID',
        'notes' => 'nullable|string',
    ]);

    $item->fill([
        'CategoryID' => $data['category'],
        'Quantity' => $data['quantity'],
        'DateAdded' => $data['date_added'],
        'Status' => $data['status'],
        'LocationID' => $data['location'],
        'Notes' => $data['notes'],
    ])->save();

    return redirect()->route('item');
}


}


