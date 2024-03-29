<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('admin/category*', 'admin/add-category*') ? 'active' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ Request::is('admin/category*', 'admin/add-category*', 'admin/edit/*') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/category', 'admin/edit/*') ? 'active' : '' }}"
                            href="{{ route('category') }}"><i class="fas fa-folder-open"></i> View
                            Category</a>
                        <a class="nav-link {{ Request::is('admin/add-category') ? 'active' : '' }}"
                            href="{{ route('add-category') }}"><i class="fas fa-plus-circle"></i> Add
                            Category</a>
                    </nav>
                </div>


                <a class="nav-link {{ Request::is('admin/view-post*', 'admin/add-post*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse"
                    data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/view-post*', 'admin/add-post*', 'admin/edit-post/*') ? 'show' : '' }} " id="pagesCollapseAuth" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/view-post', 'admin/edit-post/*') ? 'active' : '' }}" href="{{ route('view-post') }}"><i class="fas fa-file-alt mr-2"></i> View
                            Post</a>
                        <a class="nav-link {{ Request::is('admin/add-post') ? 'active' : '' }}" href="{{ route('add-post') }}"><i class="fas fa-plus-square"></i> Add
                            Post</a>
                    </nav>
                </div>


                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('admin/users') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                    Users
                </a>


                <a class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}" href="{{ url('admin/settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
