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
            background-image: url("<?php echo base_url() ?>/bg2.jpeg");
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

                <div class="card o-hidden border-0 shadow-lg my-3" style:="width:200px;">
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
                                        <h1 class="h4 text-gray-900 mb-4 \">Buat Akun Staff</h1>
                                    </div>

                                    <!-- Divider -->
                                    <hr class="sidebar-divider">

                                    <form action="/BuatAkun/store" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user  <?= ($validation->hasError('username')) ?
                                                                                                            'is-invalid' : '' ?>" id="username" name="username" placeholder="Username">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user  <?= ($validation->hasError('email')) ?
                                                                                                            'is-invalid' : '' ?>" id="email" name="email" placeholder="Email">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user  <?= ($validation->hasError('telepon')) ?
                                                                                                            'is-invalid' : '' ?>" id="telepon" name="telepon" placeholder="Telepon">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('telepon'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user  <?= ($validation->hasError('password')) ?
                                                                                                                'is-invalid' : '' ?>" id="password" name="password" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user  <?= ($validation->hasError('konfpassword')) ?
                                                                                                                'is-invalid' : '' ?>" id="konfpassword" name="konfpassword" placeholder="Konfirmasi password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('konfpassword'); ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
                                        <a href="<?php echo base_url('login'); ?>" class="btn btn-danger btn-user btn-block">
                                            Batal
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>