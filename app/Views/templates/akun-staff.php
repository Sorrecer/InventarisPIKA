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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Akun Staff</h1>
                    </div>

                                    <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col my-2">
                                <h6 class="m-0 font-weight-bold text-primary">Kelola Akun Staff</h6>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo base_url('buat-akun-staff');?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="text">Tambah Akun Staff</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Username: activate to sort column descending">Username</th>
                                        <th class="sorting sorting_asc" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Nama: activate to sort column descending">Nama</th>
                                        <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Telepon: activate to sort column descending">Telepon</th>
                                        <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Pengaturan: activate to sort column descending">Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ronny</td>
                                        <td>Ronny</td>
                                        <td>081234567890</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">
                                            <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger" href="#" data-toggle="modal" data-target="#DeleteModal">
                                            <span class="text">Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kenny</td>
                                        <td>Kenny</td>
                                        <td>081234567890</td>
                                        <td>
                                            <a href="#" class="btn btn-secondary">
                                            <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger" href="#" data-toggle="modal" data-target="#DeleteModal">
                                            <span class="text">Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
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

    <!-- Delete Data Modal-->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Hapus" untuk konfirmasi hapus data.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" data-dismiss="modal">Hapus</a>
                </div>
            </div>
        </div>
    </div>    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?php echo base_url('login');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


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