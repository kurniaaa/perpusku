<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Koleksi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-5">
                        <h3 class="d-inline-block d-sm-none"><?= $koleksi['nama'] ?></h3>
                        <div class="col-12">
                            <img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto1'] ?>" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto1'] ?>" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto2'] ?>" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto3'] ?>" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto4'] ?>" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="<?= base_url() ?>/dist/upload/foto_koleksi/<?= $koleksi['foto5'] ?>" alt="Product Image"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7">
                        <h3 class="my-3"><strong><?= $koleksi['nama'] ?></strong></h3>
                        <hr>
                        <p><strong>Kategori: </strong><?= $koleksi['kategori'] ?></p>
                        <p><strong>Pengarang: </strong><?= $koleksi['pengarang'] ?></p>
                        <p><strong>Penerbit: </strong><?= $koleksi['penerbit'] ?></p>
                        <p><strong>Tahun terbit: </strong><?= $koleksi['tahun_terbit'] ?></p>
                        <p><strong>Jumlah: </strong><?= $koleksi['jumlah'] ?></p>
                        <p><strong>Status: </strong><?= $koleksi['status'] ?></p>
                        <p><strong>Tag: </strong>
                            <?php
                            if ($koleksi['tag'] != '') {
                                $tag = explode(",", $koleksi['tag']);
                                for ($i = 0; $i < count($tag); $i++) {
                            ?>
                                    <a href="<?= base_url() ?>/search?keywords=<?= $tag[$i] ?>&kategori=all">#<?= $tag[$i] ?></a>
                            <?php
                                }
                            }
                            ?>
                        </p>
                        <?php if ($page == 'koleksi') : ?>
                            <div class="mt-4">
                                <a href="<?= base_url() ?>/koleksi-edit/<?= $koleksi['slug'] ?>">
                                    <div class="btn btn-info btn-md btn-flat">
                                        <i class="fas fa-edit fa-md mr-2"></i>
                                        Edit Koleksi
                                    </div>
                                </a>
                                <a href="javascript:hapuskoleksi('<?= $koleksi['slug'] ?>')">
                                    <div class="btn btn-danger btn-md btn-flat">
                                        <i class="fas fa-trash-alt fa-md mr-2"></i>
                                        Hapus Koleksi
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Laporan Kejadian</a>
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?= $koleksi['deskripsi'] ?></div>
                                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                    <?php if ($page == 'koleksi') : ?>
                                        <div class="mb-2">
                                            <a href="/laporan-add/<?= $koleksi['slug'] ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Laporan</a>
                                        </div>
                                    <?php endif; ?>
                                    <table class="table table-responsive table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Informasi</th>
                                                <th>Catatan</th>
                                                <th>Tgl Dibuat</th>
                                                <?php if ($page == 'koleksi') : ?>
                                                    <th>Aksi</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($laporan as $lpr) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $lpr['informasi'] ?></td>
                                                    <td><?= $lpr['catatan'] ?></td>
                                                    <td><?= date("d-M-Y H:i", strtotime($lpr['created_at'])) ?></td>
                                                    <?php if ($page == 'koleksi') : ?>
                                                        <td>
                                                            <a href="/laporan-edit/<?= $lpr['id_laporan'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                            <a href="javascript:hapuslaporan(<?= $lpr['id_laporan'] ?>)" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> Hapus</a>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>