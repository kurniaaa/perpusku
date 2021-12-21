<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User/Kolektor</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <?php foreach ($kolektor as $klt) : ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-secondary d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <?= $klt->email ?> <?= $klt->active == 1 ? '<p class="badge badge-success">active</p>' : '<p class="badge badge-danger">not active</p>' ?>
                                    <p class="badge badge-primary"></p>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $klt->fullname != '' ? $klt->fullname : $klt->username ?></b></h2>
                                            <p class="text-muted text-sm">
                                                <b>Role: </b> <?= $klt->name ?>
                                                <br>
                                                <b>Bergabung: </b> <?= $klt->created_at ?>
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= $klt->address ?></li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No Telp: <?= $klt->phone ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url() ?>/dist/upload/user_image/<?= $klt->user_image ?>" alt="user-avatar" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-primary manage_user" id="<?= $klt->id_user ?>" data-toggle="modal" data-target="#modal-kolektor">
                                            <i class="fas fa-comments"></i>
                                            Manage User
                                        </button>
                                        <a href="/admin/kolektor-profile/<?= $klt->id_user ?>" class="btn btn-sm bg-teal">
                                            <i class="fas fa-user"></i>
                                            View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $pager->links('users', 'kolektor_pagination') ?>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modal-kolektor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage User/Kolektor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>/admin/kolektor-manage" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="group">Role/group</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="group" name="group" style="width: 100%;">
                                <?php foreach ($groups as $gp) : ?>
                                    <option value="<?= $gp['id'] ?>" id="group<?= $gp['id'] ?>"><?= $gp['name'] ?> (<?= $gp['description'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <div class="icheck-danger d-inline col-md-6">
                                <input type="radio" name="active" value="0" id="active0">
                                <label for="active0">
                                    Not Active
                                </label>
                            </div>
                            <div class="icheck-success d-inline col-md-6">
                                <input type="radio" name="active" value="1" id="active1">
                                <label for="active1">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->endSection(); ?>