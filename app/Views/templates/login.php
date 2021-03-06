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
    <link href="<?php echo base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url("/bg1.jpeg");
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-0 col-md-0">

                <div class="card o-hidden border-0 shadow-lg my-5" style:="width:200px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">

                            <div class="col
                            ">
                                <div class="p-4">
                                    <div class="text-center">
                                        <img src="<?php echo base_url('/logo.png'); ?>" style="width:60px;height:60px;margin-bottom:20px">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 \">Login</h1>
                                    </div>
                                    <div class="text-center">
                                        <h2 class="h6 text-gray-900 mb-4">untuk melanjutkan</h2>
                                    </div>

                                    <!-- Divider -->
                                    <hr class="sidebar-divider">

                                    <form class="user" action="/login/cekUser" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= (session()->getFlashdata('errIdUser')) ?
                                                                                                            'is-invalid' : '' ?>" id="username" name="username" placeholder="Username">
                                            <?php
                                            if (session()->getFlashdata('errIdUser')) {

                                                echo '<div class="invalid-feedback">'
                                                    . session()->getFlashdata('errIdUser') .

                                                    '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= (session()->getFlashdata('errPassword')) ?
                                                                                                                'is-invalid' : '' ?>" id="password" name="password" placeholder="Password">
                                            <?php
                                            if (session()->getFlashdata('errPassword')) {

                                                echo '<div class="invalid-feedback">'
                                                    . session()->getFlashdata('errPassword') .

                                                    '</div>';
                                            }
                                            ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-user btn-block btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class=" text-center">
                                        <a class="small" href="<?php echo base_url('BuatAkun'); ?>">Buat Akun Staff</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

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
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/js/sb-admin-2.min.js"></script>

</body>

</html>