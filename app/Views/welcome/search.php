<?= $this->extend('layout_welcome/template'); ?>

<?= $this->section('content'); ?>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Pencarian Seluruh Koleksi</h2>
            <span class="underline center"></span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?= base_url() ?>/welcome">Home</a></li>
                <li>Cari Koleksi</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->

<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container">
                    <!-- Start: Search Section -->
                    <section class="search-filters">
                        <div class="filter-box">
                            <h3>Apa yg anda cari di PERPUSKU?</h3>
                            <form action="<?= base_url() ?>/search" method="get">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Cari berdasarkan nama koleksi atau tag" id="keywords" name="keywords" type="text" value="<?= $_GET['keywords'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <select name="kategori" id="category" class="form-control">
                                            <option value="all">Semua Kategori</option>
                                            <?php foreach ($kategori as $ktg) : ?>
                                                <option value="<?= $ktg['id'] ?>" <?= $_GET['kategori'] == $ktg['id'] ? 'selected' : '' ?>><?= $ktg['kategori'] ?></option>
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
                    <?php if ($hasil == null) : ?>
                        <div class="filter-options margin-list">
                            <div class="row">
                                <h3 style="text-align: center;"><strong>Pencarian koleksi tidak ditemukan</strong></h3>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="booksmedia-fullwidth">
                            <ul>
                                <?php foreach ($hasil as $hsl) : ?>
                                    <li>
                                        <figure>
                                            <!-- <div class="book-list-icon yellow-icon"></div> -->
                                            <a href="<?= base_url() ?>/detail/<?= $hsl['slug'] ?>"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $hsl['foto1'] ?>"></a>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="<?= base_url() ?>/detail/<?= $hsl['slug'] ?>"><?= $hsl['nama'] ?></a></h4>
                                                    <p><strong>Kategori:</strong> <?= $hsl['kategori'] ?></p>
                                                    <p><strong>Kolektor:</strong> <?= $hsl['fullname'] ?></p>
                                                </header>
                                                <p><strong>Tag</strong></p>
                                                <p>
                                                    <?php
                                                    if ($hsl['tag'] != '') {
                                                        $tag = explode(",", $hsl['tag']);
                                                        for ($i = 0; $i < count($tag); $i++) {
                                                    ?>
                                                            <a href="<?= base_url() ?>/search?keywords=<?= $tag[$i] ?>&kategori=all">#<?= $tag[$i] ?></a>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?= $pager->links('hasil', 'koleksi_pagination') ?>
                    <?php endif; ?>
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