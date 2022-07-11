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
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <div class="d-sm-flex text-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mx-auto">Rekap Data Barang</h1>
                    </div>
                    <!-- card rekap data -->
                    <div class="card shadow mb-4 mx-auto" style="width:50%">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Melihat data barang dalam rentang tanggal tertentu</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/rekap/print" method="POST">
                                <div class="col">
                                    <p>Jenis Laporan :</p>
                                    <!-- radiobutton untuk jenis laporan -->
                                    <input type="radio" checked id="tipe" name="tipe" value="1">
                                    <label for="barang-masuk">Barang masuk</label><br>
                                    <input type="radio" id="tipe" name="tipe" value="2">
                                    <label for="barang-keluar">Barang keluar</label><br>
                                    <input type="radio" id="tipe" name="tipe" value="3">
                                    <label for="selisih">Selisih masuk - keluar</label>
                                </div>
                                <hr class="sidebar-divider">
                                <div class="col my-4">
                                    <p>Rentang Tanggal :</p>
                                    <input for="tanggal-awal" type="date" class="form-control  <?= ($validation->hasError('tanggal-awal')) ?
                                                                                                    'is-invalid' : '' ?>" id="tanggal-awal" name="tanggal-awal">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal-awal'); ?>
                                    </div>
                                    <p class="my-2">Sampai dengan</p>
                                    <input for="tanggal-akhir" type="date" class="form-control <?= ($validation->hasError('tanggal-akhir') || isset($tanggalAkhirError)) ?
                                                                                                    'is-invalid' : '' ?>" id="tanggal-akhir" name="tanggal-akhir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal-akhir') . ($tanggalAkhirError ?? '') ?>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <hr class="sidebar-divider">
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary btn-icon-split" style="padding: 20px">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">CETAK</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive" style="font-size:12px">
                                <!-- tabel -->
                                <?php if ($tipe == 1) : ?>
                                    <p style="text-align: center;"><strong>Data Barang Masuk</strong><br /><strong>pada tanggal XX-XX-XXXX sampai tanggal XX-XX-XXXX</strong></p>
                                    <p style="text-align: center;"><strong>tabel</strong></p>
                                    <table style="border-collapse: collapse; width: 100%; height: 40px;" border="1">
                                        <thead class="justify-content-center my-auto">
                                            <tr style="height: 18px;">
                                                <th style="width: 7.46309%; height: 56px;">
                                                    <h5>No.</h5>
                                                </th>
                                                <th style="width: 13.8958%; height: 56px;">
                                                    <h5>ID Transaksi</h5>
                                                </th>
                                                <th style="width: 16.6249%; height: 56px;">
                                                    <h5>Tanggal Masuk</h5>
                                                </th>
                                                <th style="width: 20.5235%; height: 56px;">
                                                    <h5>Nama Barang</h5>
                                                </th>
                                                <th style="width: 11.9466%; height: 56px;">
                                                    <h5>Jumlah barang</h5>
                                                </th>
                                                <th style="width: 18.1843%; height: 56px;">
                                                    <h5>Jumlah Harga</h5>
                                                </th>
                                                <th style="width: 11.3617%; height: 56px;">
                                                    <h5>Ruang</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($barang_masuk) : ?>
                                                <?php foreach ($barang_masuk as $i => $rowmasuk) : ?>
                                                    <tr>
                                                        <td><?php echo $i + 1 . '.'; ?></td>
                                                        <td><?php echo $rowmasuk['id_transaksi']; ?></td>
                                                        <td><?php echo $rowmasuk['tanggal_masuk']; ?></td>
                                                        <td><?php echo $rowmasuk['nama_barang']; ?></td>
                                                        <td><?php echo $rowmasuk['jumlah_barang']; ?></td>
                                                        <td><?php echo $rowmasuk['jumlah_harga']; ?></td>
                                                        <td><?php echo $rowmasuk['nama_ruang']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                <?php if ($tipe == 2) : ?>
                                    <p style="text-align: center;"><strong>Data Barang Keluar</strong><br /><strong>pada tanggal XX-XX-XXXX sampai tanggal XX-XX-XXXX</strong></p>
                                    <p style="text-align: center;"><strong>tabel</strong></p>
                                    <table style="border-collapse: collapse; width: 100%; height: 74px;" border="1">
                                        <thead>
                                            <tr style="height: 18px;">
                                                <th style="width: 7.46309%; height: 56px;">
                                                    <h5>No.</h5>
                                                </th>
                                                <th style="width: 13.8958%; height: 56px;">
                                                    <h5>ID Transaksi</h5>
                                                </th>
                                                <th style="width: 16.6249%; height: 56px;">
                                                    <h5>Tanggal Keluar</h5>
                                                </th>
                                                <th style="width: 20.5235%; height: 56px;">
                                                    <h5>Nama Barang</h5>
                                                </th>
                                                <th style="width: 11.9466%; height: 56px;">
                                                    <h5>Jumlah barang</h5>
                                                </th>
                                                <th style="width: 18.1843%; height: 56px;">
                                                    <h5>Keterangan</h5>
                                                </th>
                                                <th style="width: 11.3617%; height: 56px;">
                                                    <h5>Ruang</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($barang_keluar) : ?>
                                                <?php foreach ($barang_keluar as $i => $rowkeluar) : ?>
                                                    <tr>
                                                        <td><?php echo $i + 1 . '.'; ?></td>
                                                        <td><?php echo $rowkeluar['id_transaksi']; ?></td>
                                                        <td><?php echo $rowkeluar['tanggal_keluar']; ?></td>
                                                        <td><?php echo $rowkeluar['nama_barang']; ?></td>
                                                        <td><?php echo $rowkeluar['jumlah_barang']; ?></td>
                                                        <td><?php echo $rowkeluar['keterangan']; ?></td>
                                                        <td><?php echo $rowkeluar['nama_ruang']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                <?php if ($tipe == 3) : ?>
                                    <p style="text-align: center;"><strong>Data Barang Keluar</strong><br /><strong>pada tanggal XX-XX-XXXX sampai tanggal XX-XX-XXXX</strong></p>
                                    <p style="text-align: center;"><strong>tabel</strong></p>
                                    <table style="border-collapse: collapse; width: 100%; height: 74px;" border="1">
                                        <thead>
                                            <tr style="height: 18px;">
                                                <th style="width: 7.46309%; height: 56px;">
                                                    <h5>No.</h5>
                                                </th>
                                                <th style="width: 13.8958%; height: 56px;">
                                                    <h5>Nama barang</h5>
                                                </th>
                                                <th style="width: 16.6249%; height: 56px;">
                                                    <h5>Nama kategori</h5>
                                                </th>
                                                <th style="width: 20.5235%; height: 56px;">
                                                    <h5>Jumlah</h5>
                                                </th>
                                                <th style="width: 11.9466%; height: 56px;">
                                                    <h5>Nama ruang</h5>
                                                </th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($databarang) : ?>
                                                <?php foreach ($databarang as $i => $rowbarang) : ?>
                                                    <tr>
                                                        <td><?php echo $i + 1 . '.'; ?></td>
                                                        <td><?php echo $rowbarang['nama_barang']; ?></td>
                                                        <td><?php echo $rowbarang['nama_kategori']; ?></td>
                                                        <td><?php echo $rowbarang['Jumlah']; ?></td>
                                                        <td><?php echo $rowbarang['nama_ruang']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="margin-top: 20%;">
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
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>


</body>

</html>