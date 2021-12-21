<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tag Koleksi</h1>
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
                            <h3 class="card-title">Tag Koleksi</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                                    <i class="fas fa-plus"></i> Tambah Tag
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tag</th>
                                        <th>Dibuat</th>
                                        <th>Diupdate</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tag as $tg) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $tg['tag'] ?></td>
                                            <td><?= $tg['created_at'] ?></td>
                                            <td><?= $tg['updated_at'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary tag_edit" id="<?= $tg['id'] ?>" data-toggle="modal" data-target="#modal-edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <!-- <a href="javascript:hapustag(<?= $tg['id'] ?>)" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> Hapus</a> -->
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
                <h4 class="modal-title">Tambah Tag</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>/admin/tag-add" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tag" class="col-sm-4 col-form-label">Tag koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag koleksi" required>
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
                <h4 class="modal-title">Edit Tag</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>/admin/tag-edit" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_tag" id="id_tag">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tag-edit" class="col-sm-4 col-form-label">Tag koleksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tag-edit" name="tag" placeholder="Tag koleksi" required>
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