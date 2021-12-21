<?= $this->extend('layout_welcome/template'); ?>

<?= $this->section('content'); ?>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Contact Us</h2>
            <span class="underline center"></span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?= base_url() ?>/welcome">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Contact Us Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="contact-main">
                <div class="contact-us">
                    <div class="container">
                        <div class="contact-location">
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Office Address</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li>Jl. Wonocolo Pabrik Kulit 69</li>
                                            <li>Surabaya, Jawa Timur</li>
                                            <li>Kode Pos 62171</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li>Jl. Wonocolo Pabrik Kulit 69</li>
                                            <li>Surabaya, Jawa Timur</li>
                                            <li>Kode Pos 62171</li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Office Address</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li><a href="tel:+62-8233-4282-708">Telp: +62-8233-4282-708</a></li>
                                            <li><a href="https://wa.me/082334282708">WA: +62-8233-4282-708</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="tel:+62-8233-4282-708">Telp: +62-8233-4282-708</a></li>
                                            <li><a href="https://wa.me/082334282708">WA: +62-8233-4282-708</a></li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flipcard">
                                <div class="front">
                                    <div class="top-info">
                                        <span><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</span>
                                    </div>
                                    <div class="bottom-info">
                                        <span class="top-arrow"></span>
                                        <ul>
                                            <li>www.perpusku.psmuinsa.com</li>
                                            <li>cs@perpusku.psmuinsa.com</li>
                                            <li>asnanmustakim126@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="bottom-info orange-bg">
                                        <span class="bottom-arrow"></span>
                                        <ul>
                                            <li><a href="<?= base_url() ?>/">www.perpusku.psmuinsa.com </a></li>
                                            <li><a href="mailto:cs@perpusku.psmuinsa.com">cs@perpusku.psmuinsa.com</a></li>
                                            <li><a href="mailto:asnanmustakim126@gmail.com">asnanmustakim126@gmail.com</a></li>
                                        </ul>
                                    </div>
                                    <div class="top-info dark-bg">
                                        <span><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="contact-area">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: Contact Us Section -->
<?= $this->endSection(); ?>