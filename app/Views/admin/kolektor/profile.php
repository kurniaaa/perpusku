<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Kolektor</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/dist/upload/user_image/<?= $user['user_image'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['fullname'] != null ? $user['fullname'] : $user['username'] ?></h3>

                            <p class="text-muted text-center"><?= $user['email'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?= $user['username'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Koleksi</b> <a class="float-right"><?= $jmlkoleksi ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Bergabung</b> <a class="float-right"><?= date("d-M-Y H:i", strtotime($user['created_at'])) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <?= $user['active'] == 1 ? '<a class="float-right badge badge-success">active</a>' : '<a class="float-right badge badge-danger">not active</a>' ?>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="<?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                                    print 'active';
                                                                } ?> nav-link" href="#uprofil" data-toggle="tab">Ubah Data Profil</a></li>
                                <li class="nav-item"><a class="<?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : '' ?> nav-link" href="#ufoto" data-toggle="tab">Ubah Foto Pengguna</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="<?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                print 'active';
                                            } ?> tab-pane" id="uprofil">
                                    <form class="form-horizontal" id="formUbahProfilAdmin" action="<?= base_url() ?>/profile-edit" method="POST">
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <div class="form-group row">
                                            <label for="fullname" class="col-sm-3 col-form-label">Nama lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Nama lengkap pengguna" value="<?= old('fullname') ? old('fullname') : $user['fullname'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('fullname') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="perpus" class="col-sm-3 col-form-label">Nama perpustakaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('perpus')) ? 'is-invalid' : ''; ?>" id="perpus" name="perpus" placeholder="Nama perpustakaan pribadi" value="<?= old('perpus') ? old('perpus') : $user['perpus'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('perpus') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" placeholder="Alamat" value="<?= old('address') ? old('address') : $user['address'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('address') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">No Telp</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="No Telp/HP" value="<?= old('phone') ? old('phone') : $user['phone'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('phone') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : '' ?> tab-pane" id="ufoto">
                                    <img src="<?= base_url() ?>/dist/upload/user_image/<?= $user['user_image'] ?>" width="30%" class="img-fluid img-preview rounded mx-auto d-block mb-3" alt="">
                                    <form class="form-horizontal" action="<?= base_url() ?>/profile-edit-image" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto Baru</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" id="foto" name="user_image" onchange="previewImg()">
                                                        <label class="custom-file-label" for="user_image">Pilih foto</label>
                                                    </div>
                                                </div>
                                                <?php if ($validation->hasError('user_image')) : ?>
                                                    <div class="error-validation">
                                                        <?= $validation->getError('user_image') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Simpan dan Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>