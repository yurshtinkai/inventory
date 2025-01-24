@extends('layout.main')

@section('content')
<div id="itemlost-container">
    <div>
    <div class="navbar">
                <h1>Lost Item Management</h1>
            </div>
            <div class="headerTable">
            <h2 class="fa-solid fa-computer">Device</h2>
            <button onclick="openAddLostItemModal()">+ Add Lost Item</button>
        </div>
        <div class="blue-line"></div>
        
        <table>
            <thead>
                <tr>
                    <th>ItemName</th>
                    <th>Quantity</th>
                    <th>Location</th>
                    <th>Date Reported</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="lost-items-table-body">
                <!-- Dynamic rows will be rendered here -->
                @foreach ($lostItem as $lost)
                <tr>
                    <td>{{ $lost->item_name }}</td>
                    <td>{{ $lost->Quantity }}</td>
                    <td>{{ $lost->location->LocationName }}</td>
                    <td>{{ $lost->date_reported }}</td>
                    <td>{{ $lost->remarks }}</td>
                    <td>
                    <button class="more-info" onclick="openEditLostPopup(
    '{{ $lost->id }}',
    '{{ $lost->item_name }}',
    '{{ $lost->Quantity }}',
    '{{ $lost->LocationID }}',
    '{{ $lost->date_reported }}',
    '{{ $lost->remarks }}'
)">✏️Edit</button>
                        <form action="{{ route('destroylostItem',  $lost->id) }}" method="POST">
            @csrf
            @method('DELETE')
                        <button class="delete-btn" onclick="confirmRemove(this)">❌Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Lost Item Modal -->
    <div id="add-lost-item-modal" class="popupmodal" style="display: none;">
        <div class="popup-content">
        <h3>Add Lost Item</h3>
        <form id="add-lost-item-form" action="{{ route('storeLostItem') }}" method="POST">
    @csrf
    <label for="item">Item Category</label>
    <select id="item" name="item" required>
        <option value="" disabled selected>Select an item</option>
        <option value="Monitor">Monitor</option>
        <option value="Keyboard">Keyboard</option>
        <option value="Mouse">Mouse</option>
        <option value="AVR">AVR</option>
        <option value="System Unit">System Unit</option>
    </select>

    <label for="location">Location</label>
    <select id="location" name="LocationID" required>
        @foreach($locations as $location)
            <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
        @endforeach
    </select>

<label for="quantity">Quantity:</labe>
<input type="number" name="quantity" id="quantity" required>

    <label for="date_reported">Date Reported</label>
    <input type="date" id="date_reported" name="date_reported" required>

    <label for="remarks">Remarks</label>
    <textarea id="remarks" name="remarks"></textarea>

    <button type="submit">Save</button>
    <button type="button" onclick="closeAddLostItemModal()">Cancel</button>
</form>
</div>
    </div>


    <div id="edit-lost-item-modal" class="popupmodal" style="display: none;">
    <div class="popup-content">
    <h3>Edit Lost Item</h3>
        <form id="edit-lost-item-form" action="{{ route('updateLostItem', ['lostitem' => $lost]) }}" method="POST">
                        @csrf
                        @method('PUT')
        <input type="hidden" id="edit-id" name="id">
        
        <label for="edit-item">Item</label>
        <select id="item" name="item" onchange="handleItemChange()" required>
            <option value="" disabled selected>Select an item</option>
            <option value="Monitor">Monitor</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Mouse">Mouse</option>
            <option value="AVR">AVR</option>
            <option value="System Unit">System Unit</option>
        </select>

        
        <label for="edit-quantity">Quantity:</labe>
        <input type="number" name="quantity" id="edit-quantity" required>

        <label for="edit-location">Location</label>
        <select id="edit-location" name="LocationID" required>
            @foreach($locations as $location)
                <option value="{{ $location->LocationID }}">{{ $location->LocationName }}</option>
            @endforeach
        </select>

        <label for="edit-date-reported">Date Reported</label>
        <input type="date" id="edit-date-reported" name="date_reported" required>

        <label for="edit-remarks">Remarks</label>
        <textarea id="edit-remarks" name="remarks"></textarea>

        <button type="submit">Update</button>
        <button type="button" onclick="closeEditLostItemModal()">Cancel</button>
    </form>
    </div>
</div>

</div>
@endsection