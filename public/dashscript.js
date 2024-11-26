let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
let trapquantity = document.getElementById('quantity');
let trapEditquantity = document.getElementById('editQuantity');

btn.onclick = function() {
    sidebar.classList.toggle('active');
};

document.querySelector('a[href="#"]').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('home-container').style.display = 'block';
    document.getElementById('itemlost-container').style.display = 'none';
    document.getElementById('inven-contain').style.display = 'none';
    document.getElementById('user-container').style.display = 'none';
});

document.querySelector('a[href="lostitem"]').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('home-container').style.display = 'none';
    document.getElementById('itemlost-container').style.display = 'block';
    document.getElementById('inven-contain').style.display = 'none';
    document.getElementById('user-container').style.display = 'none';
});

document.querySelector('a[href="#item"]').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('home-container').style.display = 'none';
    document.getElementById('itemlost-container').style.display = 'none';
    document.getElementById('user-container').style.display = 'none';
    document.getElementById('inven-contain').style.display = 'block';
});
document.querySelector('a[href="#user"]').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('home-container').style.display = 'none';
    document.getElementById('itemlost-container').style.display = 'none';
    document.getElementById('inven-contain').style.display = 'none';
    document.getElementById('user-container').style.display = 'block';
});
document.getElementById('logout-link').addEventListener('click', function(e) {
    e.preventDefault();  // Prevent default anchor behavior
    document.getElementById('logout-form').submit();  // Submit the form
});
function openPopup() {
    document.getElementById('popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('addForm').reset();
    const subCategoryDiv = document.getElementById('subCategory');
    subCategoryDiv.style.display = 'none';
    popup.style.height = '570px';
}

function clearform(){
    document.getElementById('addForm').reset();
}

function openEditPopup(index) {
    const row = document.querySelector(`#inventoryTable tbody tr:nth-child(${index})`);
    const category = row.children[0].textContent.split(" - ")[0];

    document.getElementById('editCategory').value = category;
    document.getElementById('editQuantity').value = row.children[1].textContent;
    document.getElementById('editDate').value = row.children[4].textContent;
    document.getElementById('editStatus').value = row.children[2].textContent;
    document.getElementById('editLocation').value = row.children[3].textContent;
    document.getElementById('editNotes').value = row.children[5].textContent;
    document.getElementById('editIndex').value = index;

    if (category === 'System Unit') {
        updateSubCategory(true); 
        const subCategory = row.children[0].textContent.split(" - ")[1];
        document.getElementById('editSubCategorySelect').value = subCategory;
    } else {
        updateSubCategory(true);
    }

    document.getElementById('editPopup').style.display = 'block';
}

function updateSubCategory(isEdit = false) {
    const category = isEdit ? document.getElementById('editCategory').value : document.getElementById('category').value;
    const subCategoryDiv = isEdit ? document.getElementById('editSubCategory') : document.getElementById('subCategory');
    const popup = isEdit ? document.getElementById('editPopup') : document.getElementById('popup');

    if (category === 'System Unit') {
        subCategoryDiv.style.display = 'block';
        popup.style.height = '650px';
    } else {
        subCategoryDiv.style.display = 'none';
        popup.style.height = '570px';
    }
}

trapquantity.addEventListener('keydown', function(e) {
    if (e.key === 'e' || e.key === '+' || e.key === '-' || e.key === '.') {
        e.preventDefault();
    }
});
trapEditquantity.addEventListener('keydown', function(e) {
    if (e.key === 'e' || e.key === '+' || e.key === '-' || e.key === '.') {
        e.preventDefault();
    }
});

function addItem() {
    const category = document.getElementById('category').value;
    const subCategory = document.getElementById('subCategorySelect').value;
    const quantity = document.getElementById('quantity').value;
    const date = document.getElementById('date').value;
    const status = document.getElementById('status').value;
    const location = document.getElementById('location').value;
    const notes = document.getElementById('notes').value;

    const displayCategory = category === 'System Unit' ? `${category} - ${subCategory}` : category;

    addItemToTable(displayCategory, quantity, status, location, date, notes);
    closePopup();
}

function addItemToTable(category, quantity, status, location, date, notes) {
    const table = document.getElementById('inventoryTable').getElementsByTagName('tbody')[0];
    const row = table.insertRow();
    
    // Populate the row with the provided data
    row.insertCell(0).textContent = category;
    row.insertCell(1).textContent = quantity;
    row.insertCell(2).textContent = status;
    row.insertCell(3).textContent = location;
    row.insertCell(4).textContent = date;
    row.insertCell(5).textContent = notes;

    // Create and append buttons in the Action colum    
    const actionCell = row.insertCell(6);
    actionCell.innerHTML = `
        <button class="more-info btn-info btn-sm" onclick="showInfo(this)">More Info</button>
        <button class="remove-btn" onclick="confirmRemove(this)">Remove</button>
    `;
}

function editItem(button) {
    const row = button.closest('tr');
    const index = Array.from(row.parentNode.children).indexOf(row) + 1;
    openEditPopup(index);
}

function updateItem() {
    const itemId = document.getElementById('editItemId').value;
    const formData = new FormData(document.getElementById('editForm'));

    fetch(`/dashboard/${itemId}`, {
        method: 'POST', // Use PUT or PATCH for updating, but this can be handled by method spoofing in Laravel
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item updated successfully!');
            location.reload(); // Optionally, refresh the page to see the changes
        } else {
            alert('Failed to update item.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the item.');
    });
}


function confirmRemove(button) {
    const row = button.closest('tr');
    
    document.getElementById('removeConfirmationPopup').style.display = 'flex';

    document.getElementById('confirmRemove').onclick = function() {
        removeItem(row);
        document.getElementById('removeConfirmationPopup').style.display = 'none';
    };
    document.getElementById('cancelRemove').onclick = function() {
        document.getElementById('removeConfirmationPopup').style.display = 'none';
    };
}


function removeItem(row) {
    row.parentNode.removeChild(row);
}



function showInfo(button) {
    const row = button.closest('tr');
    const cells = row.cells;

    // Populate the More Info popup with the selected row's data
    document.getElementById('infoCategory').textContent = cells[0].textContent;
    document.getElementById('infoQuantity').textContent = cells[1].textContent;
    document.getElementById('infoStatus').textContent = cells[2].textContent;
    document.getElementById('infoLocation').textContent = cells[3].textContent;
    document.getElementById('infoDateAdded').textContent = cells[4].textContent;
    document.getElementById('infoNotes').textContent = cells[5].textContent;

    // Save row index for editing
    document.getElementById('editIndex').value = Array.from(row.parentNode.children).indexOf(row) + 1;
    document.getElementById('infoPopup').style.display = 'block';
}

function closeInfoPopup() {
    document.getElementById('infoPopup').style.display = 'none';
}


function editItemFromInfoPopup() {
    const item = getItemFromInfoPopup(); // Retrieve the item details from the popup

    // Fill the form with the item data
    document.getElementById('editItemId').value = item.id;
    document.getElementById('editCategory').value = item.category;
    document.getElementById('editQuantity').value = item.quantity;
    document.getElementById('editDate').value = item.date;
    document.getElementById('editStatus').value = item.status;
    document.getElementById('editLocation').value = item.location;
    document.getElementById('editNotes').value = item.notes;

    // Show the edit popup
    document.getElementById('editPopup').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}

function closeImagePopup() {
    var popup = document.getElementById("imageInfoPopup");
    popup.style.display = "none";
}


window.onload = function () {
    window.scrollTo(0, 0);
};