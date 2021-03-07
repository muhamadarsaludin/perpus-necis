<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('img/logo.png'); ?>" alt="RH Logo Wedding" width="50px">
        </div>
    </a>

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">
        <a class="nav-link active" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item" href="buttons.html">List User</a>
                <a class="collapse-item" href="/admin/">User Role</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="true" aria-controls="collapseAnggota">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>Data Anggota</span>
        </a>
        <div id="collapseAnggota" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item" href="buttons.html">User List</a>
                <a class="collapse-item" href="buttons.html">User Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePetugas" aria-expanded="true" aria-controls="collapsePetugas">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>Data Petugas</span>
        </a>
        <div id="collapsePetugas" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item" href="buttons.html">User List</a>
                <a class="collapse-item" href="buttons.html">User Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuku" aria-expanded="true" aria-controls="collapseBuku">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>Data Buku</span>
        </a>
        <div id="collapseBuku" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item" href="buttons.html">User List</a>
                <a class="collapse-item" href="buttons.html">User Category</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Siswa
    </div>
    <li class="nav-item">
        <a class="nav-link active" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle sidebar-toggler" id="sidebarToggle"></button>
    </div>

</ul>