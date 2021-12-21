<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Kejadian</h1>
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
                            <h3 class="card-title">Laporan kejadian khusus <?= in_groups('user') ? user()->username : '' ?></h3>
                            <div class="float-right">
                                <?php
                                echo anchor('/laporan-add', '<i class="fas fa-plus"></i> Tambah Laporan', array('title' => 'Tambah Laporan', 'class' => 'btn btn-success'));
                                ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Koleksi</th>
                                        <th>Informasi</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($laporan as $lpr) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><a href="<?= base_url() ?>/koleksi/<?= $lpr['slug'] ?>"><strong><?= $lpr['nama'] ?> (<?= $lpr['kategori'] ?>)</strong></a></td>
                                            <td><?= $lpr['informasi'] ?></td>
                                            <td><?= $lpr['catatan'] ?></td>
                                            <td>
                                                <a href="/laporan-edit/<?= $lpr['id_laporan'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="javascript:hapuslaporan(<?= $lpr['id_laporan'] ?>)" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> Hapus</a>
                                            </td>
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