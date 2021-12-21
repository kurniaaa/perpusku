<?= $this->extend('layout_welcome/template'); ?>

<?= $this->section('content'); ?>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Detail Koleksi</h2>
            <span class="underline center"></span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?= base_url() ?>/welcome">Home</a></li>
                <li>Detail Koleksi</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <div class="row">
                        <!-- Start: Search Section -->
                        <section class="search-filters">
                            <div class="filter-box">
                                <h3>Apa yg anda cari di PERPUSKU?</h3>
                                <form action="<?= base_url() ?>/search" method="get">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Cari berdasarkan nama koleksi atau tag" id="keywords" name="keywords" type="text" value="<?= $koleksi['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <select name="kategori" id="category" class="form-control">
                                                <option value="all">Semua Kategori</option>
                                                <?php foreach ($kategori as $ktg) : ?>
                                                    <option value="<?= $ktg['id'] ?>" <?= $koleksi['id_kategori'] == $ktg['id'] ? 'selected' : '' ?>><?= $ktg['kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="submit" value="Cari">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clear"></div>
                        </section>
                        <!-- End: Search Section -->
                    </div>
                    <div class="booksmedia-detail-box">
                        <div class="detailed-box">
                            <div class="col-xs-12 col-sm-5 col-md-3">
                                <div class="post-thumbnail">
                                    <!-- <div class="book-list-icon yellow-icon"></div> -->
                                    <img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto1'] ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-5">
                                <div class="col-lg-12 post-center-content">
                                    <h2><?= $koleksi['nama'] ?></h2>
                                    <p><strong>Kategori:</strong> <?= $koleksi['kategori'] ?></p>
                                    <p><strong>Pengarang:</strong> <?= $koleksi['pengarang'] ?></p>
                                    <p><strong>Penerbit:</strong> <?= $koleksi['penerbit'] ?></p>
                                    <p><strong>Tahun Terbit:</strong> <?= $koleksi['tahun_terbit'] ?></p>
                                    <p><strong>Tag:</strong> <?php
                                                                if ($koleksi['tag'] != '') {
                                                                    $tag = explode(",", $koleksi['tag']);
                                                                    for ($i = 0; $i < count($tag); $i++) {
                                                                ?>
                                                <a href="<?= base_url() ?>/search?keywords=<?= $tag[$i] ?>&kategori=all">#<?= $tag[$i] ?></a>
                                        <?php
                                                                    }
                                                                }
                                        ?>
                                    </p>
                                    <p><strong>Deskripsi:</strong> <?= $koleksi['deskripsi'] ?></p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="post-right-content">
                                    <h4>Biodata Kolektor</h4>
                                    <p><strong>Perpustakaan:</strong> <?= $koleksi['perpus'] ?></p>
                                    <p><strong>Nama Kolektor:</strong> <?= $koleksi['fullname'] ?></p>
                                    <p><strong>Email:</strong> <?= $koleksi['email'] ?></p>
                                    <p><strong>Alamat:</strong> <?= $koleksi['address'] ?></p>
                                    <p><strong>No Telp:</strong> <?= $koleksi['phone'] ?></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<br>
<br>
<br>
<!-- End: Products Section -->
<?= $this->endSection(); ?>