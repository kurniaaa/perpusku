<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kategori Buku</span>
                            <span class="info-box-number">
                                <?= $box['buku'] ?>
                                <small>buah</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clipboard"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kejadian Khusus</span>
                            <span class="info-box-number">
                                <?= $box['laporan'] ?>
                                <small>laporan</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Koleksi</span>
                            <span class="info-box-number">
                                <?= $box['koleksi'] ?>
                                <small>koleksi</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Koleksi yg baru ditambah</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <?php foreach ($lastkoleksi as $lk) : ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $lk['foto1'] ?>" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="<?= base_url() ?>/koleksi/<?= $lk['slug'] ?>" class="product-title"><?= $lk['nama'] ?> <small><?= $lk['kategori'] ?></small></a>
                                            <span class="product-description">
                                                <?php
                                                if ($lk['tag'] != '') {
                                                    $tag = explode(",", $lk['tag']);
                                                    for ($i = 0; $i < count($tag); $i++) {
                                                ?>
                                                        <a href="<?= base_url() ?>/search?keywords=<?= $tag[$i] ?>&kategori=all">#<?= $tag[$i] ?></a>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="<?= base_url() ?>/koleksi" class="uppercase">Lihat Semua Koleksi</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan yg baru diupdate</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <?php foreach ($lastlaporan as $lp) : ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $lp['foto1'] ?>" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="<?= base_url() ?>/laporan/<?= $lp['id_laporan'] ?>" class="product-title"><?= $lp['nama'] ?> <small><?= $lp['kategori'] ?></small></a>
                                            <span class="product-description">
                                                <?= $lp['informasi'] ?>
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="<?= base_url() ?>/laporan" class="uppercase">Lihat Semua Laporan</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>