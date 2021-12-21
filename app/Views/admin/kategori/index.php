<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Koleksi</h1>
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
                            <h3 class="card-title">Kategori Koleksi</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                                    <i class="fas fa-plus"></i> Tambah Kategori
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Dibuat</th>
                                        <th>Diupdate</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori as $ktg) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $ktg['kategori'] ?></td>
                                            <td><?= $ktg['created_at'] ?></td>
                                            <td><?= $ktg['updated_at'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary kategori_edit" id="<?= $ktg['id'] ?>" data-toggle="modal" data-target="#modal-edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <!-- <a href="javascript:hapuskategori(<?= $ktg['id'] ?>)" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> Hapus</a> -->
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

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>/admin/kategori-add" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori koleksi" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>/admin/kategori-edit" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_kategori" id="id_kategori">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kategori-edit" class="col-sm-4 col-form-label">Kategori koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kategori-edit" name="kategori" placeholder="Kategori koleksi" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= $this->endSection(); ?>