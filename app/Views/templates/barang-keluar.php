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
                        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col my-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Data Barang Keluar</h6>
                                </div>
                                <div class="col text-right">
                                    <a href="<?php echo base_url('barangkeluar/tambah'); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span class="text">Tambah Barang Keluar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class=" card-body">
                            <div class="table-responsive" style="font-size:12px">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 40px;" aria-sort="ascending" aria-label="No.: activate to sort column descending">No.</th>
                                            <th class="sorting sorting_asc" tabindex="1" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="ID Barang: activate to sort column descending">ID Transaksi</th>
                                            <th class="sorting sorting_asc" tabindex="2" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Nama Barang: activate to sort column descending">Tanggal Keluar</th>
                                            <th class="sorting sorting_asc" tabindex="3" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 400px;" aria-sort="ascending" aria-label="Kategori: activate to sort column descending">Nama Barang</th>
                                            <th class="sorting sorting_asc" tabindex="4" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 190px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Jumlah Barang</th>
                                            <th class="sorting sorting_asc" tabindex="5" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Keterangan</th>
                                            <th class="sorting sorting_asc" tabindex="6" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending" aria-label="Stok: activate to sort column descending">Ruang</th>
                                            <th class="sorting sorting_asc" tabindex="7" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending" aria-label="Pengaturan: activate to sort column descending">Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:14px">
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
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModal">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                        <a href="<?php echo base_url("hapus-barang-keluar/" . $rowkeluar['id_transaksi']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger">Hapus</a>
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

    <!-- Tambah barang keluar Modal-->
    <div class="modal fade" id="barangKeluarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tanggal Keluar:</label>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
                            <select name="Kategori" class="form-control" id="kategori">
                                <option selected="selected">--Pilih barang--</option>
                                <option value="Perabotan">Meja</option>
                                <option value="Buku">Kursi</option>
                                <option value="Buku">Alat Ketam Kayu</option>
                                <option value="Buku">Sapu</option>
                                <option value="ATK">Spidol</option>
                                <option value="Buku">Lemari Buku</option>
                                <option value="Buku">Laptop DELL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jumlah Barang:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ruang:</label>
                            <select name="Kategori" class="form-control" id="kategori">
                                <option selected="selected">--Pilih Ruang--</option>
                                <option value="Perabotan">Ruang A1</option>
                                <option value="Buku">Ruang A2</option>
                                <option value="Buku">Ruang B1</option>
                                <option value="Buku">Ruang B2</option>
                                <option value="ATK">Ruang C1</option>
                                <option value="Buku">Ruang C2</option>
                                <option value="Buku">Gudang D1</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Data Modal-->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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