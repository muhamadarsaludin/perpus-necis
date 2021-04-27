<?php 
$session = session();
$userData = $session->get('user');
?>
<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('img/logo.png'); ?>" alt="RH Logo Wedding" width="50px">
        </div>
    </a>


    <?php if($userData['role'] != 'Anggota'): ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">
        <a class="nav-link <?= ($menuActive == 'dashboard admin') ? 'active' : ''; ?>" href="/admin">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'admin user') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item" href="buttons.html">Data User</a>
                <a href="/admin/officers" class="collapse-item">Data Petugas</a>
                <a href="/admin/members" class="collapse-item" href="/admin/users/role">Data Anggota</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'admin book') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseBuku" aria-expanded="true" aria-controls="collapseBuku">
            <div class="nav-icon">
                <i class="fas fa-fw fa-book"></i>
            </div>
            <span>Data Buku</span>
        </a>
        <div id="collapseBuku" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/book" class="collapse-item" href="buttons.html">Daftar Buku</a>
                <a href="/admin/ebook" class="collapse-item" href="buttons.html">Daftar eBook</a>
                <a class="collapse-item" href="buttons.html">Kategori Buku</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'admin kelas') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseKelas" aria-expanded="true" aria-controls="collapseKelas">
            <div class="nav-icon">
                <i class="fas fa-fw fa-school"></i>
            </div>
            <span>Data Kelas</span>
        </a>
        <div id="collapseKelas" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/kelas" class="collapse-item" href="buttons.html">Data Kelas</a>
                <a href="/admin/rombel" class="collapse-item" href="buttons.html">Data Rombel</a>
            </div>
        </div>
    </li>
   
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'admin borrowing') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapsePinjam" aria-expanded="true" aria-controls="collapsePinjam">
            <div class="nav-icon">
                <i class="fas fa-fw fa-cash-register"></i>
            </div>
            <span>Transaksi</span>
        </a>
        <div id="collapsePinjam" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/borrowing" class="collapse-item" href="buttons.html">Data Transaksi</a>
                <a href="/admin/transaction" class="collapse-item" href="buttons.html">Transaksi Peminjaman</a>
                <a href="/admin/transaction/return" class="collapse-item" href="buttons.html">Transaksi Pengembalian</a>
                <a href="/admin/fine" class="collapse-item" href="buttons.html">Denda Keterlambatan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($menuActive == 'admin request') ? 'active' : ''; ?>" href="/admin/request">
            <div class="nav-icon">
                <i class="fas fa-fw fa-comment-alt"></i>               
            </div>
            <span>Request Buku</span>
        </a>
    </li>

    <?php endif; ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Siswa
    </div>
    <li class="nav-item">
        <a class="nav-link <?= ($menuActive == 'dashboard user') ? 'active' : ''; ?>" href="/user">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>    
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'user book') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseBukuUser" aria-expanded="true" aria-controls="collapseBukuUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-book"></i>
            </div>
            <span>Data Buku</span>
        </a>
        <div id="collapseBukuUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/user/book" class="collapse-item" href="buttons.html">Daftar Buku</a>
                <a href="/user/ebook" class="collapse-item" href="buttons.html">Daftar eBook</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed <?= ($menuActive == 'user borrowing') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseTransUser" aria-expanded="true" aria-controls="collapseTransUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-clipboard-list"></i>
            </div>
            <span>Data Peminjaman</span>
        </a>
        <div id="collapseTransUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="" class="collapse-item" >User List</a>
                <a class="collapse-item" href="buttons.html">User Category</a>
            </div>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-id-card"></i>               
            </div>
            <span>Kartu Anggota</span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link <?= ($menuActive == 'user request') ? 'active' : ''; ?>" href="/user/request">
            <div class="nav-icon">
                <i class="fas fa-fw fa-comment-alt"></i>               
            </div>
            <span>Request Buku</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle sidebar-toggler" id="sidebarToggle"></button>
    </div>

</ul>