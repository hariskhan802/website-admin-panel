		<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }} ">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> --}}
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item {{ Route::is('articles') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('articles') }}">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Articles</span></a>
            </li>

            <li class="nav-item {{ Route::is('pages') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pages') }}">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Pages</span></a>
            </li>
            
            <li class="nav-item {{ Route::is('header-footer') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('header-footer') }}">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Header & Footer</span></a>
            </li>
            <li class="nav-item {{ Route::is('profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            

            <li class="nav-item {{ Route::is('settings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('settings') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span></a>
            </li>

            {{-- <li class="nav-item {{ Route::is('general-settings') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('general-settings') }}" >
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <div id="collapsePosts" class="collapse {{ (Route::is('general-settings') || Route::is('roles-settings')) ? 'show' : '' }}" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('general-settings') ? 'active' : '' }}" href="{{ route('general-settings') }}">General Settings</a>
                    </div>
                </div>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->