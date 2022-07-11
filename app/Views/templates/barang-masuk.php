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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Barang Masuk</h6>
                                </div>
                                <div class="col text-right">
                                    <a href="<?php echo base_url('barangmasuk/tambah'); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah Barang Masuk</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="font-size:14px">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 20px;" aria-sort="ascending" aria-label="No.: activate to sort column descending">No.</th>
                                            <th style="width: 150px;">ID Transaksi</th>
                                            <th style="width: 180px;">Tanggal Masuk</th>
                                            <th style="width: 200px;">Nama Barang</th>
                                            <th style="width: 170px;">Jumlah Barang</th>
                                            <th style="width: 150px;">Jumlah Harga</th>
                                            <th style="width: 50px;">Ruang</th>
                                            <th style="width: 150px;">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($barang_masuk) : ?>
                                            <?php foreach ($barang_masuk as $i => $rowmasuk) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 . '.'; ?></td>
                                                    <td><?php echo "M" . $rowmasuk['id_transaksi']; ?></td>
                                                    <td><?php echo $rowmasuk['tanggal_masuk']; ?></td>
                                                    <td><?php echo $rowmasuk['nama_barang']; ?></td>
                                                    <td><?php echo $rowmasuk['jumlah_barang']; ?></td>
                                                    <td><?php echo "Rp. " . number_format($rowmasuk['jumlah_harga']); ?></td>
                                                    <td><?php echo $rowmasuk['nama_ruang']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("barangmasuk/edit/" . $rowmasuk['id_transaksi']) ?>" class="btn btn-warning">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                        <a href="#" onclick="konfirmasi(<?php echo $rowmasuk['id_transaksi'] ?>)" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if (session()->getFlashdata('swal_icon')) { ?>
            Swal.fire({
                title: '<?php echo session()->getFlashdata('swal_title') ?>',
                text: '<?php echo session()->getFlashdata('swal_text') ?>',
                icon: '<?php echo session()->getFlashdata('swal_icon') ?>',
                confirmButtonText: 'Ok'
            })
        <?php } ?>

        function konfirmasi(id_transaksi) {
            Swal.fire({
                title: 'Hapus data',
                text: "Anda yakin ingin menghapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo base_url('barangmasuk/delete') ?>/" +
                        id_transaksi;
                }
            })
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>