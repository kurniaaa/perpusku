<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Admin</h1>
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
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kolekor/User</span>
                            <span class="info-box-number">
                                <?= $box['user'] ?>
                                <small>user</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Semua Koleksi</span>
                            <span class="info-box-number">
                                <?= $box['koleksi'] ?>
                                <small>buah</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Kategori</span>
                            <span class="info-box-number">
                                <?= $box['kategori'] ?>
                                <small>kategori</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hashtag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Tag</span>
                            <span class="info-box-number">
                                <?= $box['tag'] ?>
                                <small>tag</small>
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
                                            <a href="<?= base_url() ?>/admin/allkoleksi/<?= $lk['slug'] ?>" class="product-title"><?= $lk['nama'] ?> <small><?= $lk['kategori'] ?></small></a>
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
                            <a href="<?= base_url() ?>/admin/allkoleksi" class="uppercase">Lihat Semua Koleksi</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- PRODUCT LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User yg baru mendaftar</h3>
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
                                <?php foreach ($lastuser as $lu) : ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url() ?>/dist/upload/user_image/<?= $lu->user_image ?>" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="<?= base_url() ?>/admin/kolektor-profile/<?= $lu->id ?>" class="product-title"><?= $lu->username ?></a>
                                            <span class="product-description">
                                                <?= $lu->email ?>
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="<?= base_url() ?>/admin/kolektor" class="uppercase">Lihat Semua User</a>
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