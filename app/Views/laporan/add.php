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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Laporan Kejadian</h3>
                            <small class="float-right">* harus diisi</small>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url() ?>/laporan-add" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="koleksi">Koleksi*</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 <?= ($validation->hasError('koleksi')) ? 'is-invalid' : ''; ?>" id="koleksi" name="koleksi" style="width: 100%;">
                                            <option value="" disabled selected>Pilih koleksi</option>
                                            <?php foreach ($koleksi as $kls) : ?>
                                                <option value="<?= $kls['id_koleksi'] ?>" <?php if (old('koleksi') == $kls['id_koleksi']) {
                                                                                                print 'selected';
                                                                                            } else {
                                                                                                if ($slug == $kls['id_koleksi']) {
                                                                                                    print 'selected';
                                                                                                }
                                                                                            } ?>><?= $kls['nama'] ?> (<?= $kls['kategori'] ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('koleksi') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="informasi" class="col-sm-2 col-form-label">Informasi koleksi*</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control <?= ($validation->hasError('informasi')) ? 'is-invalid' : ''; ?>" name="informasi" id="informasi" rows="4" placeholder="Informasi koleksi"><?= old('informasi') ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('informasi') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catatan" class="col-sm-2 col-form-label">Catatan laporan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" name="catatan" id="catatan" rows="4" placeholder="Catatan laporan"><?= old('catatan') ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('catatan') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan Laporan</button>
                                <a href="<?= base_url() ?>/laporan" class="btn btn-default float-right">Kembali</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>