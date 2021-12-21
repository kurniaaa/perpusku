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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Koleksi</h3>
                            <small class="float-right">* harus diisi</small>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= base_url() ?>/koleksi-edit" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="slugLama" value="<?= $koleksi['slug'] ?>">
                            <input type="hidden" name="foto1Lama" value="<?= $koleksi['foto1'] ?>">
                            <input type="hidden" name="foto2Lama" value="<?= $koleksi['foto2'] ?>">
                            <input type="hidden" name="foto3Lama" value="<?= $koleksi['foto3'] ?>">
                            <input type="hidden" name="foto4Lama" value="<?= $koleksi['foto4'] ?>">
                            <input type="hidden" name="foto5Lama" value="<?= $koleksi['foto5'] ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="kategori">Kategori*</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" style="width: 100%;">
                                            <option value="" disabled>Pilih kategori koleksi</option>
                                            <?php foreach ($kategori as $ktg) : ?>
                                                <option value="<?= $ktg['id'] ?>" <?php if (old('kategori') == $ktg['id']) {
                                                                                        print 'selected';
                                                                                    } else {
                                                                                        if ($koleksi['id_kategori'] == $ktg['id']) {
                                                                                            print 'selected';
                                                                                        }
                                                                                    } ?>><?= $ktg['kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama/judul koleksi*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $koleksi['nama'] ?>" placeholder="Nama/judul koleksi">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang/penulis</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" name="pengarang" value="<?= old('pengarang') ? old('pengarang') : $koleksi['pengarang'] ?>" placeholder="Pengarang/penulis">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pengarang') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit') ? old('penerbit') : $koleksi['penerbit'] ?>" placeholder="Penerbit">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('penerbit') ?>
                                        </div>
                                    </div>
                                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun terbit</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : ''; ?>" id="tahun_terbit" name="tahun_terbit" data-toggle="datetimepicker" data-target="#tahun_terbit" value="<?= old('tahun_terbit') ? old('tahun_terbit') : $koleksi['tahun_terbit'] ?>" placeholder="Tahun terbit">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tahun_terbit') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status koleksi</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" value="<?= old('status') ? old('status') : $koleksi['status'] ?>" placeholder="Status koleksi">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('status') ?>
                                        </div>
                                    </div>
                                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah koleksi*</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ? old('jumlah') : $koleksi['jumlah'] ?>" placeholder="Jumlah koleksi">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jumlah') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tag" class="col-sm-2 col-form-label">Tag koleksi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 <?= ($validation->hasError('tag.*')) ? 'is-invalid' : ''; ?>" id="tag" name="tag[]" multiple="multiple" data-placeholder="Pilih beberapa tag" style="width: 100%;">
                                            <?php
                                            $tagLama = explode(",", $koleksi['tag']);
                                            ?>
                                            <?php foreach ($tag as $tg) : ?>
                                                <option value="<?= $tg['tag'] ?>" <?php if (old('tag')) {
                                                                                        for ($i = 0; $i < count(old('tag')); $i++) {
                                                                                            if (old('tag.' . $i) == $tg['tag']) {
                                                                                                print 'selected';
                                                                                            }
                                                                                        }
                                                                                    } else {
                                                                                        for ($i = 0; $i < count($tagLama); $i++) {
                                                                                            if ($tagLama[$i] == $tg['tag']) {
                                                                                                print 'selected';
                                                                                            }
                                                                                        }
                                                                                    } ?>><?= $tg['tag'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tag.*') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi koleksi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi koleksi"><?= old('deskripsi') ? old('deskripsi') : $koleksi['deskripsi'] ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('deskripsi') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto1" class="col-sm-2 col-form-label">Foto utama*</label>
                                    <div class="col-sm-2">
                                        <img src="/dist/upload/foto_koleksi/<?= $koleksi['foto1'] ?>" class="img-thumbnail img-preview1">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto1')) ? 'is-invalid' : ''; ?>" id="foto1" name="foto1" onchange="previewImg1()">
                                                <label class="custom-file-label" for="foto1"><?= $koleksi['foto1'] ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->hasError('foto1')) : ?>
                                            <div class="error-validation">
                                                <?= $validation->getError('foto1') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <p>**4 foto berikutnya boleh diisi foto koleksi tampak samping kanan, kiri, atas, bawah, belakang, dll.</p>
                                </div>
                                <div class="form-group row">
                                    <label for="foto2" class="col-sm-2 col-form-label">Foto 2</label>
                                    <div class="col-sm-2">
                                        <img src="/dist/upload/foto_koleksi/<?= $koleksi['foto2'] ?>" class="img-thumbnail img-preview2">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto2')) ? 'is-invalid' : ''; ?>" id="foto2" name="foto2" onchange="previewImg2()">
                                                <label class="custom-file-label" for="foto2"><?= $koleksi['foto2'] ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->hasError('foto2')) : ?>
                                            <div class="error-validation">
                                                <?= $validation->getError('foto2') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto3" class="col-sm-2 col-form-label">Foto 3</label>
                                    <div class="col-sm-2">
                                        <img src="/dist/upload/foto_koleksi/<?= $koleksi['foto3'] ?>" class="img-thumbnail img-preview3">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto3')) ? 'is-invalid' : ''; ?>" id="foto3" name="foto3" onchange="previewImg3()">
                                                <label class="custom-file-label" for="foto3"><?= $koleksi['foto3'] ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->hasError('foto3')) : ?>
                                            <div class="error-validation">
                                                <?= $validation->getError('foto3') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto4" class="col-sm-2 col-form-label">Foto 4</label>
                                    <div class="col-sm-2">
                                        <img src="/dist/upload/foto_koleksi/<?= $koleksi['foto4'] ?>" class="img-thumbnail img-preview4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto4')) ? 'is-invalid' : ''; ?>" id="foto4" name="foto4" onchange="previewImg4()">
                                                <label class="custom-file-label" for="foto4"><?= $koleksi['foto4'] ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->hasError('foto4')) : ?>
                                            <div class="error-validation">
                                                <?= $validation->getError('foto4') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto5" class="col-sm-2 col-form-label">Foto 5</label>
                                    <div class="col-sm-2">
                                        <img src="/dist/upload/foto_koleksi/<?= $koleksi['foto5'] ?>" class="img-thumbnail img-preview5">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto5')) ? 'is-invalid' : ''; ?>" id="foto5" name="foto5" onchange="previewImg5()">
                                                <label class="custom-file-label" for="foto5"><?= $koleksi['foto5'] ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->hasError('foto5')) : ?>
                                            <div class="error-validation">
                                                <?= $validation->getError('foto5') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update Koleksi</button>
                                <a href="<?= base_url() ?>/koleksi/<?= $koleksi['slug'] ?>" class="btn btn-default float-right">Kembali</a>
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