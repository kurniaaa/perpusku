<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERPUSKU | <?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/dropzone/min/dropzone.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/magnific-popup/dist/magnific-popup.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
    <style>
        .error-validation {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }

        .table>tbody>tr>td {
            vertical-align: middle;
        }
    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url() ?>/dist/img/PerpuskuLogo.png" alt="PerpuskuLogo" height="60" width="60">
        </div>

        <?= $this->include('layout/navbar'); ?>

        <?= $this->include('layout/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content'); ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-sm">
            <strong>Copyright &copy; 2021 <a href="https://instagram.com/asnanmtakim" target="_blank">Asnanmtakim</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0 <small>beta</small>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>/plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url() ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= base_url() ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?= base_url() ?>/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= base_url() ?>/plugins/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/dist/js/demo.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url() ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>/dist/js/pages/dashboard2.js"></script>

    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Min Sen Sel Rab Kam Jum Sab");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun + "";
        document.getElementById("tanggal").innerHTML = tanggallengkap;
    </script>
    <script type="text/javascript">
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds() + " WIB";
        }
    </script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('.image-link').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                },
            });
            //Initialize Select2 Elements
            $('.select2').select2();
            $(".select2multi").select2({
                tags: true,
                tokenSeparators: [',']
            })
            //Date range picker
            $('#tahun_terbit').datetimepicker({
                format: 'YYYY',
                icons: {
                    time: "fas fa-clock",
                }
            });
        });
    </script>
    <?php if (session()->getFlashdata('message_error')) { ?>
        <script>
            $(document).ready(function() {
                toastr.error("<?= session()->getFlashdata('message_error'); ?>")
            });
        </script>
    <?php } ?>
    <?php if (session()->getFlashdata('message_success')) { ?>
        <script>
            $(document).ready(function() {
                toastr.success("<?= session()->getFlashdata('message_success'); ?>")
            });
        </script>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();

            $(document).on('click', '.manage_user', function() {
                var id_user = $(this).attr("id");
                $.ajax({
                    url: "<?= base_url('admin/getOneKolektor') ?>",
                    method: "POST",
                    data: {
                        id_user: id_user
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_user').val(data.id_user);
                        $('#username').val(data.username);
                        if (data.active == 1) {
                            $('#active1').attr('checked', true).change();
                        } else {
                            $('#active0').attr('checked', true).change();
                        }
                        if (data.id_group == 1) {
                            $('#group1').attr("selected", "selected").change();
                        } else {
                            $('#group2').attr("selected", "selected").change();
                        }
                        // console.log(data);
                    }
                });
            });

            $(document).on('click', '.kategori_edit', function() {
                var id_kategori = $(this).attr("id");
                $.ajax({
                    url: "<?= base_url('admin/getOneKategori') ?>",
                    method: "POST",
                    data: {
                        id_kategori: id_kategori
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_kategori').val(data.id);
                        $('#kategori-edit').val(data.kategori);
                        console.log(data);
                    }
                });
            });

            $(document).on('click', '.tag_edit', function() {
                var id_tag = $(this).attr("id");
                $.ajax({
                    url: "<?= base_url('admin/getOneTag') ?>",
                    method: "POST",
                    data: {
                        id_tag: id_tag
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_tag').val(data.id);
                        $('#tag-edit').val(data.tag);
                        console.log(data);
                    }
                });
            });
        });

        function previewImg() {
            const foto1 = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto1.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImg1() {
            const foto1 = document.querySelector('#foto1');
            const imgPreview = document.querySelector('.img-preview1');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto1.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImg2() {
            const foto2 = document.querySelector('#foto2');
            const imgPreview = document.querySelector('.img-preview2');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto2.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImg3() {
            const foto3 = document.querySelector('#foto3');
            const imgPreview = document.querySelector('.img-preview3');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto3.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImg4() {
            const foto4 = document.querySelector('#foto4');
            const imgPreview = document.querySelector('.img-preview4');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto4.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImg5() {
            const foto5 = document.querySelector('#foto5');
            const imgPreview = document.querySelector('.img-preview5');
            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto5.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script>
        function hapuskoleksi(id) {
            Swal.fire({
                title: 'Yakin hapus data koleksi?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    ).then((result) => {
                        location.href = "<?= base_url() ?>/koleksi-delete/" + id;
                    });
                }
            });
        }

        function hapuslaporan(id) {
            Swal.fire({
                title: 'Yakin hapus laporan kejadian?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    ).then((result) => {
                        location.href = "<?= base_url() ?>/laporan-delete/" + id;
                    });
                }
            });
        }

        function hapuskategori(id) {
            Swal.fire({
                title: 'Yakin hapus kategori?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    ).then((result) => {
                        location.href = "<?= base_url() ?>/admin/kategori-delete/" + id;
                    });
                }
            });
        }
    </script>
</body>

</html>