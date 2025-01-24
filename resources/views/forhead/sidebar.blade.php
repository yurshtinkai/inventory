<div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>Inventory</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
    @if(session('username') === 'admin')
        <img src="adminlogo.png" alt="admin" class="user-img">
        <div>
            <p class="bold">ComLab</p>
            <p>Admin</p>
        </div>
    @elseif(session('username') === 'user1')
        <img src="userlogo2.jpg" alt="user1" class="user-img">
        <div>
            <p class="bold">ComLab</p>
            <p>User 1</p>
        </div>
    @elseif(session('username') === 'user2')
        <img src="userlogo.jpg" alt="user2" class="user-img">
        <div>
            <p class="bold">ComLab</p>
            <p>User 2</p>
        </div>
    @endif
</div>
        <hr>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bx bxs-home"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            @if(session('username') === 'admin')
    <li>
        <a href="{{ route('user') }}">
            <i class="bx bxs-user"></i>
            <span class="nav-item">User</span>
        </a>
        <span class="tooltip">User</span>
    </li>
@endif
            <li>
                <a href="{{ route('item') }}">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Item</span>
                </a>
                <span class="tooltip">Item</span>
            </li>
            <li>
                <a href="{{ route('lostitem') }}">
                    <i class="bx bxs-file-find"></i>
                    <span class="nav-item">LostItem</span>
                </a>
                <span class="tooltip">LostItem</span>
            </li>
            <li>
                <a>
                    <i class="fas fa-clipboard-list report-icon"></i>
                    <span class="nav-item">Reports</span>
                </a>
                <span class="tooltip">LostItem</span>
            </li> 
            <li>
                <a>
                    <i class="bx bxs-cog"></i>
                    <span class="nav-item">Settings</span>
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
