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
                        <h1 class="h3 mb-0 text-gray-800">Rekap Data Barang</h1>
                    </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col my-2">
                                <h6 class="m-0 font-weight-bold text-primary">Melihat data barang masuk atau keluar dalam rentang tanggal tertentu</h6>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p>Jenis Laporan :</p>
                                <input type="radio" id="barang-masuk" name="jenis-laporan" value="barang-masuk">
                                <label for="barang-masuk">Barang masuk</label><br>
                                <input type="radio" id="barang-keluar" name="jenis-laporan" value="barang-keluar">
                                <label for="barang-keluar">Barang keluar</label><br>
                                <input type="radio" id="selisih" name="jenis-laporan" value="selisih">
                                <label for="selisih">Selisih masuk - keluar</label>
                            </div>
                            <div class="col">
                                <p>Rentang Tanggal :</p>
                                <input type="date" class="form-control" id="tanggal-awal">
                                <p class="my-2">Sampai dengan<p>
                                <input type="date" class="form-control" id="tanggal-akhir">
                            </div>
                            <div class="col text-center my-5">
                                <a href="#" class="btn btn-primary btn-icon-split" style="padding: 20px">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text" data-toggle="modal" data-target="#barangMasukModal">CETAK</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive" style="font-size:12px">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 40px;" aria-sort="ascending" aria-label="No.: activate to sort column descending">No.</th>
                                        <th class="sorting sorting_asc" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="ID Barang: activate to sort column descending">ID Transaksi</th>
                                        <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Nama Barang: activate to sort column descending">Tanggal Masuk</th>
                                        <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 400px;" aria-sort="ascending" aria-label="Kategori: activate to sort column descending">Nama Barang</th>
                                        <th class="sorting sorting_asc" tabindex="4" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 180px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Jumlah Barang</th>
                                        <th class="sorting sorting_asc" tabindex="5" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Jumlah Harga</th>
                                        <th class="sorting sorting_asc" tabindex="6" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Ruang</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:14px">
                                    <tr>
                                        <td>1.</td>
                                        <td>TR0001</td>
                                        <td>21/08/2022</td>
                                        <td>Meja</td>
                                        <td>7</td>
                                        <td>Rp. 3.500.000</td>
                                        <td>A1</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>TR0002</td>
                                        <td>15/08/2022</td>
                                        <td>Kursi</td>
                                        <td>25  </td>
                                        <td>Rp. 3.000.000</td>
                                        <td>A3</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>TR0003</td>
                                        <td>05/07/2022</td>
                                        <td>Alat Ketam Kayu</td>
                                        <td>20</td>
                                        <td>Rp. 800.000</td>
                                        <td>B3</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>TR0004</td>
                                        <td>06/05/2022</td>
                                        <td>Sapu</td>
                                        <td>5</td>
                                        <td>Rp. 150.000</td>
                                        <td>A2</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>TR0005</td>
                                        <td>11/03/2022</td>
                                        <td>Spidol</td>
                                        <td>12</td>
                                        <td>Rp. 60.000</td>
                                        <td>B1</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>TR0006</td>
                                        <td>10/03/2022</td>
                                        <td>Lemari</td>
                                        <td>2</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>D1</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>TR0007</td>
                                        <td>05/03/2022</td>
                                        <td>Laptop DELL</td>
                                        <td>2</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>C2</td>
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