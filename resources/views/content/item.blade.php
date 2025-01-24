@extends('layout.main')

@section('content')
<div id="inven-contain">
    <div class="containertwo">
        <div class="navbar">
                <h1>Manage User</h1>
            </div>
            <div class="headerTable">
            <h2 class="fa-solid fa-list-check">>Manage Item</h2>
            <button onclick="openPopup()">Add Item</button>
        </div>
        <div class="blue-line"></div>
        <table id="inventoryTable">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Date Added</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr data-item-id="{{ $item->id }}">
                <td>{{ $item->category->CategoryName }}</td>
                <td>{{ $item->Quantity }}</td>
                <td>{{ $item->Status }}</td>
                <td>{{ $item->location->LocationName }}</td>
                <td>{{ $item->DateAdded }}</td>
                <td>{{ $item->Notes }}</td>
                <td>
                    <button class="more-info" onclick="openEditPopup(this)">✏️</button>
                    <form action="{{ route('destroy',  $item->ItemID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                    <button class="remove-btn"  onclick="confirmRemove(this)">❌</button>
                    </form>
                </td>
                


                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        



            <!-- Add Item Popup -->
            <div id="popup" class="popupmodal">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <label for="category">Category:</label>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                            @endforeach 
                        </select>

                        <label for="quantity">Quantity:</labe>
                        <input type="number" name="quantity" id="quantity" required>

                        <label for="date_added">Date Added:</label>
                        <input type="date" name="date_added" id="date_added" required>

                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            <option value="Functional">Functional</option>
                            <option value="Not Functional">Not Functional</option>
                        </select>

                        <label for="location">Location:</label>
                        <select name="location" id="location">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
                            @endforeach
                        </select>

                        <label for="notes">Notes:</label>
                        <textarea name="notes" id="notes"></textarea>

                        <button type="submit">Add Item</button>
                    </form>
                </div>
            </div>
            <!-- Edit Item Popup -->
            <div id="editPopup" class="popupmodal">
                <div class="popup-content">
                    <span class="close" onclick="closeEditPopup()">&times;</span>
                    <h3>Edit Item</h3>
                    <form action="{{ route('updateItem', ['item' => $item]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editItemId" name="ItemID" required>
                        <label for="category">Category:</label>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                             @foreach($categories as $category)
                                <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                            @endforeach 
                        </select>

                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" required>

                        <label for="date_added">Date Added:</label>
                        <input type="date" name="date_added" id="date_added" required>

                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            <option value="Functional">Functional</option>
                            <option value="Not Functional">Not Functional</option>
                        </select>

                        <label for="location">Location:</label required>
                        <select name="location" id="location">
                            <option value="">Select Location</option>
                             @foreach($locations as $location)
                                <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
                            @endforeach
                        </select>

                        <label for="notes">Notes:</label>
                        <textarea name="notes" id="notes"></textarea>

                        <button type="submit">Update Item</button>
                    </form>
                </div>
            </div>

            
@endsection