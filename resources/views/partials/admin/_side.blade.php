<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.pages.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider mb-1">

    @navItemCollapsed(['id' => 'Roles', 'icon' => 'fa-briefcase'])
        <a class="collapse-item px-0 py-1" href="#">View all</a>
        <a class="collapse-item px-0 py-1" href="#">Add new</a>
    @endnavItemCollapsed

    @navItemCollapsed(['id' => 'Users', 'icon' => 'fa-users'])
        <a class="collapse-item px-0 py-1" href="#">View all</a>
        <a class="collapse-item px-0 py-1" href="#">Add new</a>
    @endnavItemCollapsed

    <hr class="sidebar-divider mt-1">

    <!-- Sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>