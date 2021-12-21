<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>/dist/img/PerpuskuLogo.png" alt="PerpuskuLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= user()->perpus != null ? user()->perpus : 'PERPUSKU' ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/dist/upload/user_image/<?= user()->user_image ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() ?>/profile" class="d-block"><?= user()->fullname != null ? user()->fullname : user()->username ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Panel Kolektor</li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>/profile" class="nav-link <?= $page == 'profile' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>/koleksi" class="nav-link <?= $page == 'koleksi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Koleksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>/laporan" class="nav-link <?= $page == 'laporan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Laporan Kejadian
                        </p>
                    </a>
                </li>
                <?php if (in_groups('admin')) : ?>
                    <li class="nav-header">Panel Admin</li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin" class="nav-link <?= $page == 'admindashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/kolektor" class="nav-link <?= $page == 'kolektor' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Kolektor
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/allkoleksi" class="nav-link <?= $page == 'allkoleksi' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Semua Koleksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/kategori" class="nav-link <?= $page == 'kategori' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Kategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/tag" class="nav-link <?= $page == 'tag' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-hashtag"></i>
                            <p>
                                Tag
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="<?= base_url() ?>/logout" class="btn btn-warning col-12 hide-on-collapse">Logout</a>
    </div>
    <!-- /.sidebar-custom -->
</aside>