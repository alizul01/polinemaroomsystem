<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Pola<span>rys</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Welcome back Admin!</li>
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('room.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="table"></i>
                    <span class="link-title">Room</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
