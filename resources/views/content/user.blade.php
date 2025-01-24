@extends('layout.main')

@section('content')
    <div id="user-container">
    <div class="navbar">
                <h1>Manage User</h1>
            </div>  
            <div class="headerTable">
            <h1 class="bx bxs-user-check">Users</h1>
            <button onclick="openAddUser()">Add User</button>
        </div>
        <div class="blue-line"></div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>User Role</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                            <tr data-user-id="{{ $user->userID }}">
                            <td>{{ $user->userID }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->user_Role }}</td>
                            <!-- <td>{{ $user->status ?? 'Active' }}</td> -->
                            <td>
                                <button class="active-button">Active</button>
                            </td>
                            <td>{{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('F j, Y g:i A') : '' }}</td>
                            <td class="action-buttons">
                <button class="edit-btn" onclick="openEditUser(
                    '{{ $user->userID }}',
                    '{{ $user->name }}',
                    '{{ $user->username }}',
                    '{{ $user->user_Role }}'
                )">✏️</button>
                <button class="remove-btn"  onclick="confirmRemove(this)">❌</button>
            </td>
                    
                    @endforeach
                </tbody>
            </table>

            <div id="removeConfirmationPopup" class="confirm-popup" style="display: none;">
                    <div class="confirmpopup-content">
                        <h2>Remove Item</h2>
                        <p>Are you sure you want to remove this data?</p>
                        <div class="confirm-buttons">
                            <form action="{{ route('destroyuser',  $user->userID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="confirmRemove" class="btn-confirm">Yes</button>
                            </form>
                            <button id="cancelRemove" class="btn-cancel">No</button>
                        </div>
                    </div>
                </div>
                
            <div id="add-user-modal" class="popupmodal" style="display: none;">
    <div class="popup-content">
        <h3>Add User</h3>
        <form id="add-user-form" action="{{ route('userstore') }}" method="POST">
            @csrf
            <label for="add-name">Name</label>
            <input type="text" id="add-name" name="name" required>

            <label for="add-username">Username</label>
            <input type="text" id="add-username" name="username" required>

            <label for="add-user-role">User Role</label>
            <select id="add-user-role" name="userRole" required>
                <option value="" disabled selected>Select User Role</option>
                <option value="Administrator">Administrator</option>
                <option value="Data Center Staff">Data Center Staff</option>
            </select>

            <label for="add-password">Password</label>
            <input type="password" id="add-password" name="password" required>

            <label for="add-password-confirmation">Confirm Password</label>
            <input type="password" id="add-password-confirmation" name="password_confirmation" required>

            <button type="submit">Add User</button>
            <button type="button" onclick="closeAddUser()">Cancel</button>
        </form>
    </div>
</div>

            <div id="edit-user-modal" class="popupmodal">
                <div class="popup-content">
                <h3>Edit User</h3>
                <form id="edit-user-form" action="{{ route('updateUser') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-user-id" name="userID">

                    <label for="edit-name">name</label>
                    <input type="text" id="edit-name" name="name" required>

                    <label for="edit-username">Username</label>
                    <input type="text" id="edit-username" name="username" required>

                    <label for="edit-User_Role">User ROLE</label>
                    <select id="User_Role" name="userRole" required> <!-- Updated name to 'item' -->
                    <option value="" disabled selected>Select User Role</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Data Center Staff">Data Center Staff</option>
                    </select>

                    <label for="edit-password">New Password</label>
                    <input type="password" id="edit-password" name="password">

                    <label for="edit-password_confirmation">Confirm Password</label>
                    <input type="password" id="edit-password_confirmation" name="password_confirmation">

                    <button type="submit">Save Changes</button>
                    <button type="button" onclick="closeEditUser()">Cancel</button>
                </form>
                </div>
            </div>
        
    </div>
@endsection