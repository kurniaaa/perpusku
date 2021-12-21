<!-- Start: Header Section -->
<header id="header" class="navbar-wrapper">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="menu-wrap">
                    <div class="navbar-header">
                        <div class="navbar-brand">
                            <h1>
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url() ?>/images/perpusku-logo-v1.png" alt="PERPUSKU" />
                                </a>
                            </h1>
                        </div>
                    </div>
                    <!-- Navigation -->
                    <div class="navbar-collapse hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <li class="">
                                <a href="<?= base_url() ?>/welcome">Home</a>
                            </li>
                            <?php if (logged_in()) : ?>
                                <li><a href="<?= base_url() ?>/">Panel <?= user()->perpus != null ? user()->perpus : 'PERPUSKU' ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?= base_url() ?>/contact">Contact</a></li>
                        </ul>
                        <!-- Header Topbar -->
                        <div class="header-topbar hidden-md">
                            <div class="topbar-links">
                                <?php if (logged_in()) : ?>
                                    <a href="<?= base_url() ?>/profile"><i class="fa fa-user"></i><?= user()->username; ?> </a>
                                    |
                                    <a href="<?= base_url() ?>/logout"><i class="fa fa-key"></i>Logout</a>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>/login"><i class="fa fa-key"></i>Login </a>
                                    |
                                    <a href="<?= base_url() ?>/register"><i class="fa fa-lock"></i>Mendaftar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Header Topbar -->
                    </div>
                </div>
                <div class="mobile-menu hidden-md hidden-lg">
                    <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                    <div id="mobile-menu">
                        <ul>
                            <li class="mobile-title">
                                <h4>Navigation</h4>
                                <a href="#" class="close"></a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>/welcome">Home</a>
                            </li>
                            <?php if (logged_in()) : ?>
                                <li><a href="<?= base_url() ?>/">Panel <?= user()->perpus != null ? user()->perpus : 'PERPUSKU' ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?= base_url() ?>/contact">Contact</a></li>

                            <?php if (logged_in()) : ?>
                                <li>
                                    <a href="<?= base_url() ?>/profile"><i class="fa fa-user"></i> <?= user()->username; ?> </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/logout"><i class="fa fa-key"></i> Logout</a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?= base_url() ?>/login"><i class="fa fa-key"></i> Login </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/register"><i class="fa fa-lock"></i> Mendaftar</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- End: Header Section -->