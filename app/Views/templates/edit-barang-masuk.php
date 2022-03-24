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
                        <h1 class="h3 mb-0 text-gray-800">Edit Barang Masuk</h1>
                    </div>

                    <!-- Form Edit -->
                    <div class="card shadow mb-4 mx-auto" style="width:50%">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Form pengeditan barang masuk</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/barangmasuk/update" method="POST">
                                <?php //dd($barang) 
                                ?>

                                <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo $barang_masuk['id_transaksi']; ?>">
                                <div class="form-group">
                                    <label for="tanggal_masuk" class="col-form-label">Tanggal masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $barang_masuk['tanggal_masuk']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_barang" class="col-form-label">Nama barang</label>
                                    <select class="form-control" id="id_barang" name="id_barang">
                                        <?php if ($barang) : ?>
                                            <?php foreach ($barang as $rowbarang) : ?>
                                                <option value="<?php echo $rowbarang['id_barang'] ?>" <?php echo $rowbarang['id_barang'] == $barang_masuk['id_barang'] ? 'selected' : '' ?>><?php echo $rowbarang['nama_barang'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_barang" class="col-form-label">Jumlah barang</label>
                                    <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $barang_masuk['jumlah_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_harga" class="col-form-label">Jumlah harga</label>
                                    <input type="text" class="form-control" id="jumlah_harga" name="jumlah_harga" value="<?php echo $barang_masuk['jumlah_harga']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_ruang" class="col-form-label">Nama ruang</label>
                                    <select class="form-control" id="id_ruang" name="id_ruang">
                                        <?php if ($ruang) : ?>
                                            <?php foreach ($ruang as $rowruang) : ?>
                                                <option value="<?php echo $rowruang['id_ruang'] ?>" <?php echo $rowruang['id_ruang'] == $barang_masuk['id_ruang'] ? 'selected' : '' ?>><?php echo $rowruang['nama_ruang'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <hr class="sidebar-divider" style="margin-top:40px">
                                <div class="text-right">
                                    <a href="<?php echo base_url('BarangMasuk') ?>" class="btn btn-secondary btn-lg">Batal</a>
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

    <?php
    include('logoutModal.php');
    ?>


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