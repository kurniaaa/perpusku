<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>PERPUSKU | <?= $title ?></title>

    <!-- Favicon -->
    <!-- <link href="<?= base_url() ?>/images/favicon.ico" rel="icon" type="image/x-icon" /> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="<?= base_url() ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Mobile Menu -->
    <link href="<?= base_url() ?>/css/mmenu.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

    <!-- Responsive Table -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/responsivetable.css" />

    <!-- Stylesheet -->
    <link href="<?= base_url() ?>/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?= base_url() ?>/js/html5shiv.min.js"></script>
        <script src="<?= base_url() ?>/js/respond.min.js"></script>
        <![endif]-->
</head>

<body class="layout-v3">

    <?= $this->include('layout_welcome/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <div class="fullwidth-social-icons">
        <div class="container-fluid">
            <div class="row">
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank">
                            <span><i class="fa fa-facebook-f"></i> <small>Facebook</small></span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank">
                            <span><i class="fa fa-twitter"></i> <small>Twitter</small></span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank">
                            <span><i class="fa fa-google-plus"></i> <small>Google</small></span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank">
                            <span><i class="fa fa-youtube"></i> <small>Youtube</small></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Start: Footer -->
    <footer class="site-footer">
        <div class="container">
            <div id="footer-widgets">
                <div class="row">
                    <div class="col-md-6 col-sm-6 widget-container">
                        <div id="text-2" class="widget widget_text">
                            <h3 class="footer-widget-title">About Perpusku</h3>
                            <span class="underline left"></span>
                            <div class="textwidget">
                                Kelola segala koleksi pribadi anda di Perpusku
                            </div>
                            <address>
                                <div class="info">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>Jl. Wonocolo Pabrik Kulit 69 Surabaya</span>
                                </div>
                                <div class="info">
                                    <i class="fa fa-envelope"></i>
                                    <span><a href="mailto:cs@perpusku.psmuinsa.com">cs@perpusku.psmuinsa.com</a></span>
                                </div>
                                <div class="info">
                                    <i class="fa fa-phone"></i>
                                    <span><a href="https://wa.me/082334282708">082334282708</a></span>
                                </div>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 widget-container">
                        <div id="nav_menu-2" class="widget widget_nav_menu">
                            <h3 class="footer-widget-title">Kategori Koleksi</h3>
                            <span class="underline left"></span>
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    <?php foreach ($kategori as $ktg) : ?>
                                        <li><a href="#"><?= $ktg['kategori'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-text col-md-3">
                        <p><a target="_blank" href="https://www.instagram.com/asnanmtakim">asnanmtakim</a></p>
                    </div>
                    <div class="col-md-9 pull-right">
                        <ul>
                            <li><a href="<?= base_url() ?>/welcome">Home</a></li>
                            <?php if (logged_in()) : ?>
                                <li><a href="<?= base_url() ?>/">Panel <?= user()->perpus != null ? user()->perpus : 'PERPUSKU' ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?= base_url() ?>/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <!-- jQuery Latest Version 1.x -->
    <script type="text/javascript" src="<?= base_url() ?>/js/jquery-1.12.4.min.js"></script>

    <!-- jQuery UI -->
    <script type="text/javascript" src="<?= base_url() ?>/js/jquery-ui.min.js"></script>

    <!-- jQuery Easing -->
    <script type="text/javascript" src="<?= base_url() ?>/js/jquery.easing.1.3.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= base_url() ?>/js/bootstrap.min.js"></script>

    <!-- Mobile Menu -->
    <script type="text/javascript" src="<?= base_url() ?>/js/mmenu.min.js"></script>

    <!-- Harvey - State manager for media queries -->
    <script type="text/javascript" src="<?= base_url() ?>/js/harvey.min.js"></script>

    <!-- Waypoints - Load Elements on View -->
    <script type="text/javascript" src="<?= base_url() ?>/js/waypoints.min.js"></script>

    <!-- Facts Counter -->
    <script type="text/javascript" src="<?= base_url() ?>/js/facts.counter.min.js"></script>

    <!-- MixItUp - Category Filter -->
    <script type="text/javascript" src="<?= base_url() ?>/js/mixitup.min.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="<?= base_url() ?>/js/owl.carousel.min.js"></script>

    <!-- Accordion -->
    <script type="text/javascript" src="<?= base_url() ?>/js/accordion.min.js"></script>

    <!-- Responsive Tabs -->
    <script type="text/javascript" src="<?= base_url() ?>/js/responsive.tabs.min.js"></script>

    <!-- Responsive Table -->
    <script type="text/javascript" src="<?= base_url() ?>/js/responsive.table.min.js"></script>

    <!-- Masonry -->
    <script type="text/javascript" src="<?= base_url() ?>/js/masonry.min.js"></script>

    <!-- Carousel Swipe -->
    <script type="text/javascript" src="<?= base_url() ?>/js/carousel.swipe.min.js"></script>

    <!-- bxSlider -->
    <script type="text/javascript" src="<?= base_url() ?>/js/bxslider.min.js"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="<?= base_url() ?>/js/main.js"></script>

</body>


</html>