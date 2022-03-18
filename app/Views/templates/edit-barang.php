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
                        <h1 class="h3 mb-0 text-gray-800">Edit Jenis Barang</h1>
                    </div>

                    <!-- Form Edit -->
                    <div class="card shadow mb-4 mx-auto" style="width:50%">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Form pengeditan jenis barang</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url("JenisBarang/update/" . $id_barang) ?>" method="POST">
                                <?php //dd($barang) 
                                ?>

                                <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $barang['id_barang']; ?>">
                                <div class="form-group">
                                    <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                    <input type="text" class="form-control  <?= ($validation->hasError('nama_barang')) ?
                                                                                'is-invalid' : '' ?>" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori" class="col-form-label">Nama Kategori</label>
                                    <select class="form-control  <?= ($validation->hasError('id_kategori')) ?
                                                                        'is-invalid' : '' ?>" id="id_kategori" name="id_kategori">
                                        <?php if ($kategori) : ?>
                                            <?php foreach ($kategori as $rowkategori) : ?>
                                                <option value="<?php echo $rowkategori['id_kategori'] ?>" <?php echo $rowkategori['id_kategori'] == $barang['id_kategori'] ? 'selected' : '' ?>><?php echo $rowkategori['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kategori'); ?>
                                    </div>
                                </div>
                                <hr class="sidebar-divider" style="margin-top:40px">
                                <div class="text-right">
                                    <a href="<?php echo base_url('JenisBarang') ?>" class="btn btn-secondary btn-lg">Batal</a>
                                    <button type="submit" class="btn btn-primary btn-lg mx-3">Edit</button>
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