let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
const sidebarItems = document.querySelectorAll('.sidebar ul li a');
const logoutLink = document.querySelector('#logout-link');

// Toggle sidebar state and save to localStorage
btn.onclick = function () {
    sidebar.classList.toggle('active');
    localStorage.setItem('sidebarState', sidebar.classList.contains('active') ? 'active' : '');
};

// Check local storage for sidebar state on page load
if (localStorage.getItem('sidebarState') === 'active') {
    sidebar.classList.add('active');
}

// Add click event to all sidebar links
sidebarItems.forEach(item => {
    item.addEventListener('click', () => {
        // Save the clicked link to local storage
        localStorage.setItem('activeLink', item.href);

        // Remove 'active' class from all items
        sidebarItems.forEach(i => i.classList.remove('active'));

        // Add 'active' class to the clicked item
        item.classList.add('active');
    });
});

// Restore active link from local storage on page load
const activeLink = localStorage.getItem('activeLink');
if (activeLink) {
    sidebarItems.forEach(item => {
        if (item.href === activeLink) {
            item.classList.add('active');
        }
    });
}

// Clear active link from localStorage when logging out
if (logoutLink) {
    logoutLink.addEventListener('click', () => {
        localStorage.removeItem('activeLink');
    });
}


document.getElementById('logout-link').addEventListener('click', function(e) {
    e.preventDefault();  // Prevent default anchor behavior
    document.getElementById('logout-form').submit();  // Submit the form
});


function openPopup() {
    document.getElementById('popup').style.display = 'block';
}
function openAddLostItemModal() {
    document.getElementById('add-lost-item-modal').style.display = 'block';
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



function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}

function closeImagePopup() {
    var popup = document.getElementById("imageInfoPopup");
    popup.style.display = "none";
}


//edit user
function openEditUser(userID, name, username, userRole) {
    document.getElementById('edit-user-id').value = userID;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-username').value = username;
    document.getElementById('User_Role').value = userRole;

    document.getElementById('edit-user-modal').style.display = 'block';
}

// Add this new function to handle form submission
function submitEditUserForm(event) {
    event.preventDefault();
    
    const form = document.getElementById('edit-user-form');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the table row with new data
            const userRow = document.querySelector(`tr[data-user-id="${data.user.userID}"]`);
            userRow.querySelector('td:nth-child(2)').textContent = data.user.name;
            userRow.querySelector('td:nth-child(3)').textContent = data.user.username;
            userRow.querySelector('td:nth-child(4)').textContent = data.user.user_Role;
            
            // Close the modal
            closeEditUser();
            
            // Optional: Show success message
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the user');
    });
}


function closeEditUser() {
    // Close the modal and show the user container
    document.getElementById('edit-user-modal').style.display = 'none';
    document.getElementById('user-container').style.display = 'block';
}

function openEditPopup(button) {
    const row = button.closest('tr');
    const itemId = row.dataset.itemId;
    const category = row.dataset.category;
    const quantity = row.dataset.quantity;
    const date = row.dataset.date;
    const status = row.dataset.status;
    const location = row.dataset.location;
    const notes = row.dataset.notes;

    document.getElementById('editItemId').value = itemId;
    document.getElementById('category').value = category;
    document.getElementById('quantity').value = quantity;
    document.getElementById('date_added').value = date;
    document.getElementById('status').value = status;
    document.getElementById('location').value = location;
    document.getElementById('notes').value = notes;

    document.getElementById('editPopup').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
}

function toggleSubCategory() {
    const mainCategory = document.getElementById('item');
    const subCategoryDiv = document.getElementById('systemUnitSubCategory');
    const subCategory = document.getElementById('sub_category');
    
    if (mainCategory.value === 'System Unit') {
        subCategoryDiv.style.display = 'block';
        subCategory.required = true;
    } else {
        subCategoryDiv.style.display = 'none';
        subCategory.required = false;
    }
}

function openEditLostPopup(id, itemName, locationId, dateReported, remarks) {
    document.getElementById('edit-lost-item-modal').style.display = 'block';
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-item').value = itemName.split('-')[0]; // Get main category
    document.getElementById('edit-location').value = locationId;
    document.getElementById('edit-date-reported').value = dateReported;
    document.getElementById('edit-remarks').value = remarks;

    // Handle sub-category for System Unit
    if (itemName.startsWith('System Unit')) {
        document.getElementById('edit-system-unit-sub').style.display = 'block';
        document.getElementById('edit-sub-category').value = itemName; // Full item name
    } else {
        document.getElementById('edit-system-unit-sub').style.display = 'none';
    }
}


function closeEditLostItemModal() {
    document.getElementById('edit-lost-item-modal').style.display = 'none';
}

function closeAddLostItemModal() {
    document.getElementById('add-lost-item-modal').style.display = 'none';
}

function handleItemChange() {
    const itemDropdown = document.getElementById('item');
    const subcategoryContainer = document.getElementById('subcategory-container');
    const subcategoryDropdown = document.getElementById('subcategory');

    if (itemDropdown.value === 'System Unit') {
        subcategoryContainer.style.display = 'block';
    } else {
        subcategoryContainer.style.display = 'none';
        subcategoryDropdown.value = ''; // Reset subcategory value if not System Unit
    }
}


