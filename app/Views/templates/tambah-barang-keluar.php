<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventaris PIKA</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        #aktif.active {
            background-color: #ffb700
        }

        #aktif2.active {
            background-color: #ffb700
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('sidebar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('topbar.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="align-items-center text-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Barang Keluar</h1>
                    </div>

                    <!-- Form tambah -->
                    <div class="card shadow mb-4 mx-auto" style="width:50%">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Form input barang keluar</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/barangkeluar/store" method="POST">
                                <div class="form-group">
                                    <label for="tanggal_keluar" class="col-form-label">Tanggal keluar</label>
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_keluar')) ?
                                                                                'is-invalid' : '' ?>" id="tanggal_keluar" name="tanggal_keluar">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_keluar'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_barang" class="col-form-label">Nama barang</label>
                                    <select class="form-control <?= ($validation->hasError('id_barang')) ?
                                                                    'is-invalid' : '' ?>" id="id_barang" name="id_barang">
                                        <option value="" selected="selected">--Pilih barang--</option>
                                        <?php if ($barang) : ?>
                                            <?php foreach ($barang as $rowbarang) : ?>
                                                <option value="<?php echo $rowbarang['id_barang'] ?>"><?php echo $rowbarang['nama_barang'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_barang" class="col-form-label">Jumlah barang</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('jumlah_barang')) ?
                                                                                    'is-invalid' : '' ?>" id="jumlah_barang" name="jumlah_barang">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ?
                                                                                'is-invalid' : '' ?>" id="keterangan" name="keterangan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_ruang" class="col-form-label">Nama ruang</label>
                                    <select class="form-control <?= ($validation->hasError('id_ruang')) ?
                                                                    'is-invalid' : '' ?>" id="id_ruang" name="id_ruang">
                                        <option value="" selected="selected">--Pilih ruang--</option>
                                        <?php if ($ruang) : ?>
                                            <?php foreach ($ruang as $rowruang) : ?>
                                                <option value="<?php echo $rowruang['id_ruang'] ?>"><?php echo $rowruang['nama_ruang'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_ruang'); ?>
                                    </div>
                                </div>
                                <hr class="sidebar-divider" style="margin-top:40px">
                                <div class="text-right">
                                    <a href="<?php echo base_url('barangkeluar') ?>" class="btn btn-secondary btn-lg">Batal</a>
                                    <button type="submit" class="btn btn-primary btn-lg mx-3">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Inventaris PIKA 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar dari Akun?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah untuk keluar dari sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?php echo base_url('login'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>/js/demo/datatables-demo.js"></script>


</body>

</html>