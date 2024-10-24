<ul class="navbar-nav bg-custom sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">9P's</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Str::startsWith(request()->route()->getName(), 'admin.asset') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.asset')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Assets</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            if (localStorage.getItem('sidebar-toggle') === 'toggled') {
                localStorage.setItem('sidebar-toggle', '');
            } else localStorage.setItem('sidebar-toggle', 'toggled');
        });

        const sidebarState = localStorage.getItem('sidebar-toggle');
        if (sidebarState === 'toggled') {
            const sidebar = document.getElementById('accordionSidebar');
            sidebar.classList.toggle('toggled');
        }
    });
</script>