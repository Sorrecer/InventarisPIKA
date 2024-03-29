<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventaris PIKA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
                    </div>

                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h2 mb-0 font-weight-bold text-gray-800">
                                        <?php echo session()->id_level == '1' ? 'Admin' : 'Staff'  ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <hr class="sidebar-divider">
                            <table>
                                <thead>
                                    <td class="row no-gutters align-items-center my-3" style="width:150px">
                                        <div class="h8 mb-0 font-weight-bold text-gray-800">Username</div>
                                    </td>
                                    <td><?php echo ": " . session()->username ?></td>
                                </thead>
                                <tr>
                                    <td class="row no-gutters align-items-center my-3">
                                        <div class="h8 mb-0 font-weight-bold text-gray-800">Email</div>
                                    </td>
                                    <td><?php echo ": " . session()->email ?></td>
                                </tr>
                                <tr>
                                    <td class="row no-gutters align-items-center my-3">
                                        <div class="h8 mb-0 font-weight-bold text-gray-800">No. Telp</div>
                                    </td>
                                    <td><?php echo ": " . session()->telepon ?></td>
                                </tr>
                            </table>
                            <hr class="sidebar-divider">
                            <div class="row" style="justify-content: flex-end">
                                <div style="padding:10px">
                                    <a href="<?php echo base_url('PengaturanAkun/edit/' . session()->id_user); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-cog"></i>
                                        </span>
                                        <span class="text">Edit Profil</span>
                                    </a>
                                </div>
                                <!-- <div style="padding:10px">
                                    <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#ubahPasswordModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <span class="text">Ubah Password</span>
                                    </a>
                                </div> -->
                                <div style="padding:10px">
                                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#logoutModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </span>
                                        <span class="text">Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white" style="margin-top:20%">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto ">
                            <span>Copyright &copy; Inventaris PIKA 2022 </span>
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
                        <a class="btn btn-primary" href="<?php echo base_url('login/keluar'); ?>">Logout</a>
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
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>