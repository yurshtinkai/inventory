<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LostItem;
use App\Models\Location;

class LostItemController extends Controller
{
    public function index(){
        $lostItem = LostItem::all();
        $locations = Location::all();
        return view('content.lostitem', compact('lostItem', 'locations'));
    }
    public function storeLostItem(Request $request)
{
    $request->validate([
        'item' => 'required|string',
        'quantity' => 'required|integer',
        'LocationID' => 'required|exists:locations,LocationID',
        'date_reported' => 'required|date',
        'remarks' => 'nullable|string',
    ]);

    $username = session('username');

    if ($username) {
        $user = User::where('username', $username)->first();

        $lost = new LostItem();

        $lost->item_name = $request->input('item'); // Corrected field
        $lost->Quantity = $request->input('quantity'); // Corrected field
        $lost->LocationID = $request->input('LocationID'); // Corrected field
        $lost->date_reported = $request->input('date_reported');
        $lost->remarks = $request->input('remarks');
        $lost->userID = $user->userID;
        $lost->save();

        return back()->with('success', 'Lost item added successfully!');
    }

    return back()->with('error', 'User session not found.');
}

public function edit(LostItem $lostitem)
{
    $locations = Location::all();
    return response()->json([
        'item' => $lostitem,
        'locations' => $locations,
    ]);
}
public function updateLostItem(Request $request, LostItem $lostitem)
{
    $data = $request->validate([
        'item' => 'required|string',
        'quantity' => 'required|integer',
        'LocationID' => 'required|exists:locations,LocationID',
        'date_reported' => 'required|date',
        'remarks' => 'nullable|string',
    ]);

    $lostitem->fill([
        'item_name' => $data['item'],
        'Quantity' => $data['quantity'],
        'LocationID' => $data['LocationID'],
        'date_reported' => $data['date_reported'],
        'remarks' => $data['remarks'],
    ])->save();

    return redirect()->route('lostitem')->with('success', 'Lost item updated successfully!');
}
public function destroylostItem($id)
{
    $lost = LostItem::find($id);
    $lost->delete();
    return redirect()->route('lostitem');
}


}
