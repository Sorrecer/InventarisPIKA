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
                    <h1 class="h3 mb-2 text-gray-800">Nama Barang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Nama Barang</h6>
                                </div>
                                <div class="col text-right">
                                    <a href="<?php echo base_url('jenisbarang/tambah'); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah Nama Barang</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 40px;" aria-sort="ascending" aria-label="No.: activate to sort column descending">No.</th>
                                            <th class="sorting sorting_asc" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="ID Barang: activate to sort column descending">ID Barang</th>
                                            <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 400px;" aria-sort="ascending" aria-label="Nama Barang: activate to sort column descending">Nama Barang</th>
                                            <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Kategori: activate to sort column descending">Kategori</th>
                                            <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Kategori: activate to sort column descending">Stok Minimal</th>
                                            <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Pengaturan: activate to sort column descending">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($barang) : ?>
                                            <?php foreach ($barang as $i => $rowbarang) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 . '.'; ?></td>
                                                    <td><?php echo $rowbarang['id_barang']; ?></td>
                                                    <td><?php echo $rowbarang['nama_barang']; ?></td>
                                                    <td><?php echo $rowbarang['nama_kategori']; ?></td>
                                                    <td><?php echo $rowbarang['jumlah_minimal']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("JenisBarang/edit/" . $rowbarang['id_barang']) ?>" class="btn btn-warning">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                        <a href="#" onclick="konfirmasi(<?php echo $rowbarang['id_barang'] ?>)" class="btn btn-danger">
                                                            Hapus
                                                        </a>
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

        function konfirmasi(id_barang) {
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
                    window.location.href = "<?php echo base_url('JenisBarang/delete') ?>/" +
                        id_barang;
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