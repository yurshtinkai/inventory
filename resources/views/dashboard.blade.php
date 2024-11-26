<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="dashstyle.css">
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>Inventory</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
            <img src="adminlogo.png" alt="me" class="user-img">
            <div>
                <p class="bold">ComLab.</p>
                <p>Admin</p>
            </div>
        </div>
        <hr>
        <ul>
            <li>
                <a href="#">
                    <i class="bx bxs-home"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#user">
                    <i class="bx bxs-user"></i>
                    <span class="nav-item">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#item">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Item</span>
                </a>
                <span class="tooltip">Item</span>
            </li>
            <li>
                <a href="lostitem">
                    <i class="bx bxs-file-find"></i>
                    <span class="nav-item">LostItem</span>
                </a>
                <span class="tooltip">LostItem</span>
            </li>
            <li>
                <a href="report">
                    <i class="bx bxs-report"></i>
                    <span class="nav-item">ItemReport</span>
                </a>
                <span class="tooltip">LostItem</span>
            </li> 
            
            <li>
    <a href="#" id="logout-link">
        <i class="bx bx-log-out"></i>
        <span class="nav-item">Logout</span>
    </a>
    <span class="tooltip">Logout</span>
    <form id="logout-form" method="POST" action="{{ route('log-out') }}" style="display: none;">
        @csrf
    </form>
</li>
        </ul>
    </div>
    <div class="main-content">
    <div id="home-container">
    <h1 class="welcome-text">Welcome to the Inventory System</h1>
    <p class="subtitle">Manage your inventory efficiently and effortlessly</p>
    <div class="content">
        <!-- Image Gallery -->
        <div class="image-gallery">
            <div class="image-item">
                <img src="memory-ddr4.png" alt="RAM" class="gallery-img">
                <p class="image-name">Random Access Memory (RAM)</p>
            </div>
            <div class="image-item">
                <img src="motherboard.png" alt="Motherboard" class="gallery-img">
                <p class="image-name">Motherboard</p>
            </div>
            <div class="image-item">
                <img src="cpu.png" alt="CPU" class="gallery-img">
                <p class="image-name">Central Processing Unit (CPU)</p>
            </div>
            <div class="image-item">
                <img src="psu.png" alt="Power Supply" class="gallery-img">
                <p class="image-name">Power Supply Unit</p>
            </div>
            <div class="image-item">
                <img src="monitor.png" alt="Monitor" class="gallery-img">
                <p class="image-name">Monitor</p>
            </div>
            <div class="image-item">
                <img src="mouse.png" alt="Mouse" class="gallery-img">
                <p class="image-name">Mouse</p>
            </div>
            <div class="image-item">
                <img src="keyboard.png" alt="Keyboard" class="gallery-img">
                <p class="image-name">Keyboard</p>
            </div>
            <div class="image-item">
                <img src="avr.png" alt="AVR" class="gallery-img">
                <p class="image-name">Automatic Voltage Regulator (AVR)</p>
            </div>
        </div>

        <!-- Info Boxes -->
        <div class="info-boxes">
            <div class="info-box">
                <h3>RAM</h3>
                <p>Detail: 8GB DDR4</p>
                <p>Quantity: 22</p>
            </div>
            <div class="info-box">
                <h3>Motherboard</h3>
                <p>Detail: Not Provided</p>
                <p>Quantity: 23</p>
            </div>
            <div class="info-box">
                <h3>CPU</h3>
                <p>Detail: Intel Core i7-10700K</p>
                <p>Quantity: 22</p>
            </div>
            <div class="info-box">
                <h3>Power Supply</h3>
                <p>Detail: 650W Power Supply</p>
                <p>Quantity: 35</p>
            </div>
            <div class="info-box">
                <h3>Monitor</h3>
                <p>Detail: Not Provided</p>
                <p>Quantity: 20</p>
            </div>
            <div class="info-box">
                <h3>Mouse</h3>
                <p>Detail: Wireless Optical Mouse</p>
                <p>Brand: Logitech</p>
            </div>
            <div class="info-box">
                <h3>Keyboard</h3>
                <p>Detail: Mechanical Keyboard</p>
                <p>Brand: Logitech</p>
                <p>Quantity: 22</p>
            </div>
            <div class="info-box">
                <h3>AVR</h3>
                <p>Detail: 500VA AVR</p>
                <p>Quantity: 25</p>
            </div>
        </div>
    </div>
</div>
        <div id="user-container" style="display: none;">
    <div>
    <nav class="navbar">
            <h1>User Management</h1>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Last Login</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->userID }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->status ?? 'Active' }}</td> <!-- Default to 'Active' if status is not available -->
                    <td>{{ $user->last_login ?? 'N/A' }}</td> <!-- Default to 'N/A' if last_login is not available -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


        <div id="inven-contain" style="display: none;">
    <div class="containertwo">
        <nav class="navbar">
            <h1>ComputerLab Inventory</h1>
        </nav>
        <button class="add-button" onclick="openPopup()">Add Item</button>
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
                    <button class="more-info" onclick="showInfo(this)">More Info</button>
                    <button class="remove-btn"  onclick="confirmRemove(this)">Remove </button>
                </td>
                <div id="removeConfirmationPopup" class="confirm-popup" style="display: none;">
    <div class="confirmpopup-content">
        <h2>Remove Item</h2>
        <p>Are you sure you want to remove this data?</p>
        <div class="confirm-buttons">
            <form action="{{ route('destroy',  $item->ItemID) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" id="confirmRemove" class="btn-confirm">Yes</button>
            </form>
            <button id="cancelRemove" class="btn-cancel">No</button>
        </div>
    </div>
</div>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
        
            <!-- Add Item Popup -->
            <div id="popup" class="popup">
                <span class="close" onclick="closePopup()">&times;</span>
                <div class="popup-content">

    <form method="POST" action="{{ route('store') }}">
    @csrf
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
    <!-- <button type="reset">Clear</button> -->
</form>





    </div>
    </div>
            <!-- Edit Item Popup use ID -->
            <div id="editPopup" class="id" style="display: none;">
                <div class="popup-content">
                    <span class="close" onclick="closeEditPopup()">&times;</span>
                    <h3>Edit Item</h3>
                    <form id="editForm">
                        <label for="editCategory">Category:</label>
                        <select id="editCategory" name="category" required onchange="updateSubCategory(true)">
                            <option value="">Select Category</option>
                            <option value="Monitor">Monitor</option>
                            <option value="System Unit">System Unit</option>
                            <option value="Mouse">Mouse</option>
                            <option value="AVR">AVR</option>
                            <option value="Speaker">Speaker</option>
                        </select>
                        
                        <div id="editSubCategory" class="sub-category">
                            <label for="editSubCategorySelect">System Unit Parts:</label>
                            <select id="editSubCategorySelect" name="subCategory">
                                <option value="">Select Part</option>
                                <option value="RAM">RAM</option>
                                <option value="Motherboard">Motherboard</option>
                                <option value="SSD">SSD</option>
                                <option value="CPU">CPU</option>
                                <option value="Power Supply">Power Supply</option>
                                <option value="CPU cooler">CPU cooler</option>
                            </select>
                        </div>
        
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" id="editQuantity" name="quantity" required>
        
                        <label for="editDate">Date Added:</label>
                        <input type="date" id="editDate" name="date" required>
        
                        <label for="editStatus">Status:</label>
                        <select id="editStatus" name="status" required>
                            <option value="Functional">Functional</option>
                            <option value="Not Functional">Not Functional</option>
                        </select>
        
                        <label for="editLocation">Location:</label>
                        <select id="editLocation" name="location" required>
                            <option value="Comlab1">Comlab1</option>
                            <option value="Comlab2">Comlab2</option>
                        </select>
        
                        <label for="editNotes">Notes:</label>
                        <textarea id="editNotes" name="notes"></textarea>
        
                        <input type="hidden" id="editIndex">
                        <button type="button" onclick="updateItem()">Save Changes</button>
                    </form>
                </div>
            </div>
            <div id="infoPopup" class="information-popup">
                <span class="close" onclick="closeInfoPopup()">&times;</span>
                <div class="information-popup-content">
                    <h2>More Information</h2>
                    <p><strong>Category:</strong> <span id="infoCategory"></span></p>
                    <hr>
                    <p><strong>Quantity:</strong> <span id="infoQuantity"></span></p>
                    <hr>
                    <p><strong>Status:</strong> <span id="infoStatus"></span></p>
                    <hr>
                    <p><strong>Location:</strong> <span id="infoLocation"></span></p>
                    <hr>
                    <p><strong>Date Added:</strong> <span id="infoDateAdded"></span></p>
                    <hr>
                    <p><strong>Notes:</strong> <span id="infoNotes"></span></p>
                    <hr>
                    
                    <div class="info-buttons">
                        <button class="edit" onclick="editItemFromInfoPopup()">Edit</button>
                    </div>
                </div>
            </div>
            
            <div id="itemlost-container" style="display: none;">
            <div>
        <p>We would love to hear from you! Whether you have a question or just want to say hello, feel free to reach out to us using the information or form below.</p>
        </div>
</div>
            
        </div>
        
        
    </div>
    <script src="dashscript.js"></script>
</body>
</html>