<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand" href="{{ route('welcome') }}">
        {{ config('app.name') }}
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item text-white-50 font-bold">
        <a class="nav-link" href="{{ route('admin.pages.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider mb-1">

    @navItemCollapsed(['id' => 'Roles', 'icon' => 'fa-briefcase'])
        <a class="collapse-item px-0 py-1" href="{{ route('admin.roles.index') }}">
            View all
        </a>
        <a class="collapse-item px-0 py-1" href="{{ route('admin.roles.create') }}">
            Add new
        </a>
    @endnavItemCollapsed

    @navItemCollapsed(['id' => 'Users', 'icon' => 'fa-users'])
        <a class="collapse-item px-0 py-1" href="{{ route('admin.users.index') }}">
            View all
        </a>
        <a class="collapse-item px-0 py-1" href="{{ route('admin.users.create') }}">
            Add new
        </a>
    @endnavItemCollapsed

    <hr class="sidebar-divider mt-1">

    @navItemCollapsed(['id' => 'Categories', 'icon' => 'fa-share-alt'])
        <a class="collapse-item px-0 py-1" href="{{ route('admin.categories.index') }}">
            View all
        </a>
        <a class="collapse-item px-0 py-1" href="{{ route('admin.categories.create') }}">
            Add new
        </a>
    @endnavItemCollapsed

    @navItemCollapsed(['id' => 'Tags', 'icon' => 'fa-tags'])
        <a class="collapse-item px-0 py-1" href="{{ route('admin.tags.index') }}">
            View all
        </a>
        <a class="collapse-item px-0 py-1" href="{{ route('admin.tags.create') }}">
            Add new
        </a>
    @endnavItemCollapsed

    @navItemCollapsed(['id' => 'Articles', 'icon' => 'fa-database'])
        <a class="collapse-item px-0 py-1" href="{{ route('admin.articles.index') }}">
            View all
        </a>
        <a class="collapse-item px-0 py-1" href="{{ route('admin.articles.create') }}">
            Add new
        </a>
    @endnavItemCollapsed

    <!-- Sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>