<?= $this->extend('layout_welcome/template'); ?>

<?= $this->section('content'); ?>
<!-- Start: Slider Section -->
<div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
    <!-- Carousel slides -->
    <div class="carousel-inner">
        <div class="item active">
            <figure>
                <img alt="Home Slide" src="images/header-slider/home-v3/header-slide.jpg" />
            </figure>
            <div class="container">
                <div class="carousel-caption">
                    <h2>Apa itu Perpusku?</h2>
                    <p>Perpusku menyediakan sarana untuk mengelola perpustakaan pribadi anda.</p>
                    <div class="filter-box">
                        <form action="<?= base_url() ?>/search" class="banner-filter-box" method="get">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Cari berdasarkan nama koleksi atau tag </label>
                                <input class="form-control" placeholder="Cari berdasarkan nama koleksi atau tag" id="keywords" name="keywords" type="text">
                            </div>
                            <div class="form-group">
                                <select name="kategori" id="category" class="form-control">
                                    <option value="all">Semua Kategori</option>
                                    <?php foreach ($kategori as $ktg) : ?>
                                        <option value="<?= $ktg['id'] ?>"><?= $ktg['kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <input class="form-control" type="submit" value="Cari">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Slider Section -->

<!-- Start: Features -->
<!-- <section class="features">
    <div class="container-fluid">
        <div class="row">
            <ul>
                <li class="bg-yellow">
                    <div class="feature-box">
                        <i class="yellow"></i>
                        <h3>Buku</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
                <li class="bg-light-green">
                    <div class="feature-box">
                        <i class="light-green"></i>
                        <h3>Komik</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
                <li class="bg-blue">
                    <div class="feature-box">
                        <i class="blue"></i>
                        <h3>DVD</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
                <li class="bg-red">
                    <div class="feature-box">
                        <i class="red"></i>
                        <h3>Artikel</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
                <li class="bg-violet">
                    <div class="feature-box">
                        <i class="violet"></i>
                        <h3>MP3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
                <li class="bg-green">
                    <div class="feature-box">
                        <i class="green"></i>
                        <h3>eAudio</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section> -->
<!-- End: Features -->

<!-- Start: Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-wrap">
                    <div class="welcome-text">
                        <h2 class="section-title">Selamat datang di perpusku</h2>
                        <span class="underline left"></span>
                        <p>Mengumpulkan koleksi memang merupakan hobi yang menyenangkan. Tidak hanya berupa buku, mainan, novel, bahkan lukisan dapat kita simpan sebagai koleksi. Akan tetapi, jika kita memiliki banyak koleksi, hal tersebut tentu memiliki permasalahannya sendiri. Sebut saja kita lupa satu atau dua barang koleksi kita. Perpusku merupakan sebuah solusi untuk masalah tersebut. Perpusku merupakan aplikasi berbasis web sehingga bisa diakses dimanapun dan kapanpun. Perpusku juga memiliki berbagai fitur untuk mengelola koleksi yang kita miliki seperti pendataan, pencarian, dan pelaporan. Perpusku merupakan sebuah aplikasi yang dapat membantu kalian para kolektor untuk mempermudah dalam menginventarisasi koleksi yang dimiliki. Segera gunakan aplikasi perpusku. Dengan perpusku, koleksi jadi aman.</p>
                        <a class="btn btn-dark-gray" href="<?= base_url() ?>/register">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-image"></div>
</section>
<!-- End: Welcome Section -->

<?= $this->endSection(); ?>