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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        #aktif.active {
            background-color: #1cd400
        }

        /* checkbox tombol aktif */
        /* btnaktif {
            background-color: red
        }

        #aktif:checked + btnaktif {
            background-color: #1cd400
        } */
    </style>

    <script src="vendor/jquery/jquery.min.js"></script>
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
                                    <a href="<?php echo base_url('akunstaff/tambah'); ?>" class="btn btn-primary btn-icon-split">
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
                                            <th class="sorting sorting_asc" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Nama: activate to sort column descending">Email</th>
                                            <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Telepon: activate to sort column descending">Telepon</th>
                                            <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Aktif: activate to sort column descending">Aktif</th>
                                            <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Pengaturan: activate to sort column descending">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($staff) : ?>
                                            <?php foreach ($staff as $rowstaff) : ?>
                                                <tr>
                                                    <td><?php echo $rowstaff['username']; ?></td>
                                                    <td><?php echo $rowstaff['email']; ?></td>
                                                    <td><?php echo $rowstaff['telepon']; ?></td>
                                                    <td>
                                                        <!-- <button type="button" class="btn btn-secondary" id="aktif">Aktif</button> -->
                                                        <label class="switch">
                                                            <input type="checkbox" class="aktif" value="<?= $rowstaff['id_user'] ?>" <?php echo $rowstaff['aktif'] ? 'checked' : '' ?>>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <!-- <input type="checkbox" id="aktif"/>
                                                        <btnaktif class="btn btn-secondary" for="aktif">Aktif</btnaktif> -->
                                                    <td>
                                                        <a href="<?php echo base_url('akunstaff/edit/' . $rowstaff['id_user']); ?>" class="btn btn-warning">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                        <a href="<?php echo base_url("hapus-staff/" . $rowstaff['id_user']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus data Ini?')" class="btn btn-danger">Hapus</a>
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
            <script>
                $('.aktif').click(function() {
                    $.post('<?php echo base_url('AkunStaff/aktif') ?>', {
                            id: $(this).val(),
                            aktif: $(this).prop('checked') ? 1 : 0
                        },
                        // function(data, status) {
                        //     alert(data);
                        // }
                    )
                })
            </script>
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