<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Koleksi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data koleksi <?= in_groups('user') ? user()->username : '' ?></h3>
                            <div class="float-right">
                                <?php
                                echo anchor('/koleksi-add', '<i class="fas fa-plus"></i> Tambah Koleksi', array('title' => 'Tambah Koleksi', 'class' => 'btn btn-success'));
                                ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Nama Koleksi</th>
                                        <th>Tahun Terbit</th>
                                        <th>Status</th>
                                        <th>Jumlah</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($koleksi as $klk) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $klk['kategori'] ?></td>
                                            <td><?= $klk['nama'] ?></td>
                                            <td><?= $klk['tahun_terbit'] ?></td>
                                            <td><?= $klk['status'] ?></td>
                                            <td><?= $klk['jumlah'] ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $klk['foto1'] ?>" class="image-link">
                                                    <img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $klk['foto1'] ?>" alt="" style="width:30px;height:30px">
                                                </a>
                                            </td>
                                            <?php if ($page == 'koleksi') : ?>
                                                <td><a href="/koleksi/<?= $klk['slug'] ?>" class="btn btn-sm btn-info">Detail</a></td>
                                            <?php else : ?>
                                                <td><a href="/admin/allkoleksi/<?= $klk['slug'] ?>" class="btn btn-sm btn-info">Detail</a></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>